<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['vid']=$_POST['vehicle'];
		//echo $_SESSION['uid'];
		header("Location: admin_vehicle_moredetails_page.php");
	}
?>

<?php include('../../public/html/admin_viewaccount3.html')?>
<?php require_once('footer.php')?>


