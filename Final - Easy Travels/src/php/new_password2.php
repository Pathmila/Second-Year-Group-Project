<?php require_once('../../config/connect.php');
    session_start();
?>
<?php require_once('user_nonnavigation.php')?> 

<?php		
    if(isset($_POST['submit'])){
		$token=$_POST['token'];

		$sql="select * from password_reset where token='".$token."' ";
		//echo $sql;
		$result=mysqli_query($connection,$sql);
		while($row=$result->fetch_assoc()){
			$email=(string)$row['email'];
		}
		
		$sql5="select * from guide where email='".$email."' ";
		$result5=mysqli_query($connection,$sql5);
		while($row5=$result5->fetch_assoc()){
			$id=(string)$row5['gid'];
		}
		
		
		$npassword=(string)$_POST['new_pass'];
		$ncpassword=(string)$_POST['new_pass_c'];
		//echo $npassword;
		//echo $ncpassword;
		$hashnew= md5($ncpassword);
		//echo $hashnew;
		if(($token != null)){
			$sql1 = "UPDATE account SET password ='".$hashnew."' where uid='$id' and admin=2"; 
			echo $sql1;
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				echo "<script> alert('Password update is sucessfull') </script>";
				
				$sql6="delete from password_reset where token='".$token."'";
				$result6=mysqli_query($connection,$sql6);
				
				header("Location: recover_done.php");
			}else{
				echo "<script> alert('Password update is failed') </script>";
				header("Location: login_page.php");
			}
		}else{
			//echo "Failed";			
			echo "<script> alert('Password Not Matched') </script>";
			header("Location: login_page.php");

		}
	}
?>

<?php include('../../public/html/new_password2.html')?>
<?php require_once('footer.php')?>


