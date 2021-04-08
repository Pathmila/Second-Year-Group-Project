<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['uid']=$_POST['user'];
		//echo $_SESSION['uid'];
		header("Location: admin_user_moredetails_page.php");
	}
	if(isset($_POST['viewticket'])){
    	$next= $_POST['selectedID'];
    	$_SESSION['uid']=$next;
    	
    	header("Location: admin_user_moredetails_page.php");
	}
?>
<?php include('../../public/html/admin_viewaccount1.html')?>



