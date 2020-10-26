<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['cid']=$_POST['cid'];
		//echo $_SESSION['uid'];
		header("Location: admin_view_comment_moredetails.php");
	}
?>


<?php include('../../public/html/admin_view_report_general4.html')?>
<?php require_once('footer.php')?>


