<?php 
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(hid) from hotel";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(hid)'];
    $nextid=$maxid+1;
?>
<?php require_once('hotel_navigation.php')?> 
<?php require_once('hotel_view_navigation.php')?>
<?php
	$path='../../public/images/hotel/';
	$ex='.jpg';
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";

	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
		$uname=(string)$row['username'];
    }
	
	$sql1="select * from hotel where hid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=$row1['name'];
		$email=$row1['email'];
		$address=$row1['address'];
		$telephone=$row1['telephone'];
		$photo=$row1['photo'];
		$description=$row1['description'];
		$singlerooms=$row1['singlerooms'];
		$singleroomprice=$row1['singleroomprice'];
		$doublerooms=$row1['doublerooms'];
		$doubleroomprice=$row1['doubleroomprice'];
		$familyrooms=$row1['familyrooms'];
		$familyroomprice=$row1['familyroomprice'];		
    }
	
?>

<?php
        if(isset($_POST['updatebtn'])){
			$targetdir = '../../public/images/hotel/';   
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
			$username=$_POST['uname'];
            $address=$_POST['address'];
            $description = $_POST['description'];
            $email= $_POST['email'];
            $telephone =$_POST['telephone'];
			$srooms=$_POST['srooms'];
			$sroomprice=$_POST['sprice'];
			$drooms=$_POST['drooms'];
			$droomprice=$_POST['dprice'];
			$frooms=$_POST['frooms'];
			$froomprice=$_POST['fprice'];
			$photo=$nextid;

//update data to guide  table
			$insertguide = "update hotel set name='".$name."',address='".$address."',telephone='".$telephone."',
			email='".$email."',description='".$description."',photo='".$photo."',singleroomprice='".$sroomprice."',
			singlerooms='".$srooms."',doubleroomprice='".$droomprice."',doublerooms='".$drooms."',familyroomprice='".$froomprice."',
			familyrooms='".$frooms."' where hid='".$uid."'";
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
                       

               if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1) ){
                   echo "<script> alert('Update is Sucessfull') </script>";
					header("Location: hotel_home_page.php");
                }else{
                    //echo "failed";
					echo "<script> alert('Update is Failed') </script>";
					
                }
        }        
?>
	
<?php include('../../public/html/hotel_update_profile.html')?>
<?php require_once('footer.php')?>