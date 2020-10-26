<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$type=$_POST['type'];
		$_SESSION['type']=$_POST['type'];
		if( $type == "guide"){
			header("Location: admin_check_availability1.php");
		}
		if( $type == "vehicle"){
			header("Location: admin_check_availability2.php");
		}
		if( $type == "hotel"){
			header("Location: admin_check_availability3.php");
		}
	}
?>
<?php include('../../public/html/admin_check_availability.html')?>
<?php require_once('footer.php')?>



