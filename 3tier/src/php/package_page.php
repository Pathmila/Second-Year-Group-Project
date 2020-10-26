<?php require_once('../../config/connect.php');
	session_start();
    ?>
<?php require_once('user_nonnavigation.php')?> 

<?php
    if(isset($_GET['submit'])){
		$_SESSION['packid']=$_GET['pack_id'];
		//echo $_SESSION['packid'];
        header("Location: package_more_details_page.php");
    }
?>

<?php include('../../public/html/package_page.html')?>
<?php require_once('footer.php')?>


    
        
    