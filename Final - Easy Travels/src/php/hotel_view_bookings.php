<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=3){
        header('Location: login_page.php');
    }
?>

<?php require_once('hotel_navigation.php')?> 
<?php require_once('hotel_view_navigation.php')?>

<?php include('../../public/html/hotel_view_bookings.html')?>	
<?php require_once('footer_hotel.php')?>        