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
		header("Location: admin_assign_page-availability1.php");
	}
?>
<?php include('../../public/html/admin_assign_page-availability2.html')?>



