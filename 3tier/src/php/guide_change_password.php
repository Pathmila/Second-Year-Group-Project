<?php require_once('../../config/connect.php');
    session_start();
	$uname=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
?>
<?php require_once('guide_navigation.php')?> 
<?php require_once('guide_view_navigation.php')?>

<?php 	
	//echo $aid;	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$id=(string)$row['uid'];
		$pw=(string)$row['password'];
		$uname=(string)$row['username'];
	}
?>

<?php		
    if(isset($_GET['submit'])){
        $password=$_GET['password'];
		$npassword=$_GET['newpassword'];
		$ncpassword=$_GET['confirmpassword'];
		//echo $password;
		//echo $pw;
		//echo $npassword;
		//echo $ncpassword;
		if(($npassword == $ncpassword)&&($pw == $password)){
			$sql1 = "UPDATE account SET password ='".$ncpassword."' where aid='".$aid."'"; 
			//echo $sql1;
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				echo "<script> alert('Password update is sucessfull') </script>";
				header("Location: guide_view_profile.php");
			}else{
				echo "<script> alert('Password update is failed') </script>";
			}
		}else{
			//echo "Failed";
			echo "<script> alert('Password update is failed') </script>";
		}
	}
?>


<?php include('../../public/html/guide_change_password.html')?>
<?php require_once('footer.php')?>