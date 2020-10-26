<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$pack=$_SESSION['package'];
 ?>
 <?php
    if(isset($_POST['submit'])){
		$pack=$_POST['name'];
		$sql="Delete from package where name='".$pack."'"; 
		//echo $sql;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert('Delete is failed') </script>";				
			//header("Location: admin_home_page.php");
        }  
	}
?>
 
<?php include('../../public/html/admin_deletetravelpackage_page.html')?>
<?php require_once('footer.php')?>