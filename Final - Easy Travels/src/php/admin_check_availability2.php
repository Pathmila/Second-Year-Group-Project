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
		$_SESSION['vid']=$_POST['vehicle'];
		header("Location: admin_vehicle_moredetails_page.php");
	}
	if(isset($_POST['viewticket'])){
    	$next= $_POST['selectedID'];
    	$_SESSION['vid']=$next;
    	
    	header("Location: admin_vehicle_moredetails_page.php");
	}
?>

<?php include('../../public/html/admin_check_availability2.html')?>




