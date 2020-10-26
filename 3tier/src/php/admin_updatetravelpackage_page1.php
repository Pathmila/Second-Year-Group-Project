<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>

<?php 
    require_once('../../config/connect.php');
    session_start();
?>

<?php
	if(isset($_POST['btnsubmit'])){
		//echo asini;
		$_SESSION['package']=$_POST['package'];
		header("Location: admin_updatetravelpackage_page.php");
	}
?>
<?php include('../../public/html/admin_updatetravelpackage_page1.html')?>
<?php require_once('footer.php')?>