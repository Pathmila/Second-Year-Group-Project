<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<?php
    $dname=$_SESSION['dname'];
?>

<?php
    if(isset($_GET['submit'])){
		$_SESSION['t1packid']=$_GET['pack_id'];
		//echo $_SESSION['t1packid'];
        header("Location: user_package_for_destination_more_details_page.php");
    }
?>

<?php include('../../public/html/user_package_for_destion_page.html')?>
<?php require_once('footer_user.php')?>


    
        
    