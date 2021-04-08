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
		$_SESSION['gid']=$_POST['guide'];
		header("Location: admin_guide_moredetails_page.php");
	}
	if(isset($_POST['viewticket'])){
    	$next= $_POST['selectedID'];
    	$_SESSION['gid']=$next;
    	
    	header("Location: admin_guide_moredetails_page.php");
	}
?>
<?php include('../../public/html/admin_check_availability1.html')?>



