<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>

<?php 
	$uname=$_SESSION['username'];
	//$password=$_SESSION['pwd'];
	//echo $password;
	$aid=$_SESSION['aid'];
	//echo $aid;	
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
		//echo $ncpassword;
		$hash = md5($getpassword);
		$hashnew= md5($ncpassword);
		//echo $hashnew;
		if(($npassword == $ncpassword)){
			if(($pw == $hash)){
				$sql1 = "UPDATE account SET password ='".$hashnew."' where aid='".$aid."'"; 
				//echo $sql1;
	            $result1 = mysqli_query($connection,$sql1);
				if($result1){
					$getpassword = "";
					$npassword = "";
					$ncpassword= "";
					echo "<script> alert('Password update is sucessfull') </script>";
					//header("Location: user_home_page.php");
				}
			}else{
				$getpassword = "";
				echo "<script> alert('Current password is wrong') </script>";
			}
		}else{
			//echo "Failed";
			$getpassword = "";
			$npassword = "";
			$ncpassword= "";
			echo "<script> alert('Password update is failed') </script>";
		}
		$_SESSION['pwd']=$ncpassword;
	}
?>

<?php include('../../public/html/admin_change_password.html')?>
