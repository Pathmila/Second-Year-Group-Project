<?php require_once('guide_navigation.php')?> 
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=2){
        header('Location: login_page.php');
    }
?>
<?php require_once('guide_view_navigation.php')?>

<?php include('../../public/html/guide_view_bookings.html')?>
<?php require_once('guide_footer.php')?>