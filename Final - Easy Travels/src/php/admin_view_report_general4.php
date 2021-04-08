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
		$_SESSION['cid']=$_POST['cid'];
		//echo $_SESSION['uid'];
		header("Location: admin_view_comment_moredetails.php");
	}
	if(isset($_POST['viewticket'])){
    	$next= $_POST['selectedID'];
    	$_SESSION['cid']=$next;
    	
    	header("Location: admin_view_comment_moredetails.php");
	}
?>


<?php include('../../public/html/admin_view_report_general4.html')?>



