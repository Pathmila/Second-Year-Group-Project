<?php require_once('user_nonnavigation.php')?> 
<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(photo) from guide";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(photo)'];
    $nextid=$maxid+1;
?>
<?php
        if(isset($_POST['formsubmit'])){
			$targetdir = '../../images/guide/';   
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
        $_GLOBAL['guideavailability']=0;

            if(isset($_POST['formsubmit'])){
				$name=$_POST['name'];
				$username=$_POST['uname'];
                $password=$_POST['cpassword'];
                $address=$_POST['address'];
                $birthday=$_POST['birthday'];
                $description = $_POST['description'];
                $email= $_POST['email'];
                $telephone =$_POST['telephone'];
                $availability=$_POST['availability'];
				$photo=$nextid;

//insert data to guide  table

		    	$insertguide = "INSERT INTO guide(name,birthday,address,telephone,email,description,photo) values ('".$name."','".$birthday."','".$address."','".$telephone."','".$email."','".$description."','".$photo."')";
                $result2=$connection->query($insertguide);
		    	//echo $insertguide;
		    	if($result2){
		    		$_GLOBAL['guidedone']=1;
		    	}else{
		    		$_GLOBAL['guidedone']=0;
                }
                
				$sql8="select max(gid) from guide";
				$result8=mysqli_query($connection,$sql8);
				$max=mysqli_fetch_assoc($result8);
				$maxgid=$max['max(gid)'];

//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$maxgid."','".$username."','".$password."',2)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
            

 //insert in to account availabilty table
				$insertguideavailability = "INSERT INTO guideavailability(gid,availability) values ('".$maxgid."','".$availability."')";
				$result=$connection->query($insertguideavailability);
				if($result){
					$_GLOBAL['guideavailability']=1;
				}else{
					$_GLOBAL['guideavailability']=0;
				}
               if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1) && ($_GLOBAL['guideavailability']==1)){
					echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: login_page.php");
                }else{
                    //echo "failed";
					echo "<script> alert('Registration is Failed') </script>";
                }
        }        
?>


<?php include('../../public/html/guide_signup_page.html')?>
<?php require_once('footer.php')?>
