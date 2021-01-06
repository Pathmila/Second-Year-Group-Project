<?php require_once('guide_navigation.php')?> 
<?php require_once('guide_view_navigation.php')?>
<?php 
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(gid) from guide";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(gid)'];
    $nextid=$maxid+1;
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
?>
<?php
	$path='../../public/images/guide/';
	$ex='.jpg';
?>
<?php	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
		$uname=(string)$row['username'];
    }
	
	$sql1="select * from guide where gid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=(string)$row1['name'];
		$charge=$row1['charge'];
		$dob=(string)$row1['birthday'];
		$address=(string)$row1['address'];
		$telephone=(string)$row1['telephone'];
		$email=(string)$row1['email'];
		$description=(string)$row1['description'];
		$photo1=(string)$row1['photo'];
		//echo $photo1;
    }
	
?>
<?php
        if(isset($_POST['updatebtn'])){
			$targetdir = '../../public/images/guide/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;
			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			}
        }        
?>
	<?php
		$_GLOBAL['accountdone']=0;
        $_GLOBAL['guidedone']=0;

        if(isset($_POST['updatebtn'])){
			$name=$_POST['name'];
			$charge=$_POST['charge'];
			$username=$_POST['uname'];
            $address=$_POST['address'];
            $birthday=$_POST['birthday'];
            $description = $_POST['description'];
            $email= $_POST['email'];
            $telephone =$_POST['telephone'];

			$photo=$nextid;

//update data to guide  table
			$insertguide = "update guide set name='".$name."', charge='".$charge."', birthday='".$birthday."',address='".$address."',telephone='".$telephone."',email='".$email."',description='".$description."',photo='".$photo."' where gid='".$uid."'";
			//echo $insertguide;
			$result2=$connection->query($insertguide);
			//echo $insertguide ;
		    	
		    if($result2){
		    	$_GLOBAL['guidedone']=1;
		    }else{
		    	$_GLOBAL['guidedone']=0;
            }

//update in to account table
			$insertaccount = "update account set username='".$username."' where aid='".$aid."' ";
			$result=$connection->query($insertaccount);
			//echo $insertaccount;
			if($result){
				$_GLOBAL['accountdone']=1;
			}else{
				$_GLOBAL['accountdone']=0;
			}
                       

            if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1)){
                echo "<script> alert('Update is Sucessfull') </script>";
				header("Location: guide_view_profile.php");
			}else{
                //echo "failed";
				echo "<script> alert('Update is Failed') </script>";	
            }
        }        
?>

<?php include('../../public/html/guide_update_profile.html')?>
<?php require_once('guide_footer.php')?>
