<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>

<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['subcategory']=$_POST['subcat'];
		header("Location: admin_updatesubcategory_page2.php");
	}
?>
<?php include('../../public/html/admin_updatesubcategory_page1.html')?>
