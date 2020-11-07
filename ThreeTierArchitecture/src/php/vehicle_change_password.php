<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php require_once('vehicle_navigation.php')?> 
<?php require_once('vehicle_view_navigation.php')?>

<?php 
	$uname=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	//echo $password;	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$id=(string)$row['uid'];
		$pw=(string)$row['password'];
		//echo $pw;
		$uname=(string)$row['username'];
	}
?>

<?php		
    if(isset($_POST['submit'])){
        $getpassword=$_POST['password'];
		$npassword=(string)$_POST['newpassword'];
		$ncpassword=(string)$_POST['confirmpassword'];
		//echo $getpassword;
		//echo md5("vehicle1");
		
		$hash = md5($getpassword);
		$hashnew= md5($ncpassword);
		//echo $hashnew;
		if(($npassword == $ncpassword)&&($pw == $hash)){
			$sql1 = "UPDATE account SET password ='".$hashnew."' where aid='".$aid."'"; 
			//echo $sql1;
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				echo "<script> alert('Password update is sucessfull') </script>";
				header("Location: vehicle_home_page.php");
			}else{
				echo "<script> alert('Password update is failed') </script>";
			}
		}else{
			//echo "Failed";
			echo "<script> alert('Password update is failed') </script>";
		}
		$_SESSION['pwd']=$ncpassword;
	}
?>

<?php include('../../public/html/vehicle_change_password.html')?>
<?php require_once('footer.php')?>