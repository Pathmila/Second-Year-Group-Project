<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['gid']=$_POST['guide'];
		//echo $_SESSION['uid'];
		header("Location: admin_guide_moredetails_page.php");
	}
?>
<?php include('../../public/html/admin_viewaccount4.html')?>
<?php require_once('footer.php')?>


