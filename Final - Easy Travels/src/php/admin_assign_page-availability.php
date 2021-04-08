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
		$type=$_POST['type'];
		$_SESSION['type']=$_POST['type'];
		if( $type == "vehicle"){
			header("Location: admin_assign_page-availability1.php");
		}
		if( $type == "guide"){
			header("Location: admin_assign_page-availability2.php");
		}
		if( $type == "hotel"){
			header("Location: admin_assign_page-availability3.php");
		}
	}
?>
<?php include('../../public/html/admin_assign_page-availability.html')?>




