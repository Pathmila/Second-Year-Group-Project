<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['hid']=$_POST['hotel'];
		header("Location: admin_hotel_moredetails_page.php");
	}
?>
<?php include('../../public/html/admin_check_availability3.html')?>
<?php require_once('footer.php')?>


