<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?>

<?php
    if(isset($_GET['submit'])){
		$_SESSION['packid']=$_GET['pack_id'];
		//echo $_SESSION['packid'];
        header("Location: user_package_more_details_page.php");
    }
?>

<?php require_once('user_navigation.php')?> 
<?php include('../../public/html/user_package_page.html')?>
<?php require_once('footer_user.php')?>


    
        
    