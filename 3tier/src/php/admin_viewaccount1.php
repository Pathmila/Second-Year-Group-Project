<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['uid']=$_POST['user'];
		//echo $_SESSION['uid'];
		header("Location: admin_user_moredetails_page.php");
	}
?>
<?php include('../../public/html/admin_viewaccount1.html')?>
<?php require_once('footer.php')?>


