<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$type=$_POST['type'];
		$_SESSION['type']=$_POST['type'];
		if( $type == "user"){
			header("Location: admin_viewaccount1.php");
		}
		if( $type == "hotel"){
			header("Location: admin_viewaccount2.php");
		}
		if( $type == "vehicle"){
			header("Location: admin_viewaccount3.php");
		}
		if( $type == "guide"){
			header("Location: admin_viewaccount4.php");
		}
	}
?>

<?php include('../../public/html/admin_viewaccount.html')?>
<?php require_once('footer.php')?>


