<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 
<?php require_once('user_view_profile_navigation.php')?>

<?php include('../../public/html/user_view_bookings.html')?>
<?php require_once('footer_user.php')?>


