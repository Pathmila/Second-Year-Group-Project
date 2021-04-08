<?php require_once('vehicle_navigation.php')?> 

<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=4){
        header('Location: login_page.php');
    }
?>

<?php require_once('vehicle_view_navigation.php')?>
<?php include('../../public/html/vehicle_view_bookings.html')?>
<?php require_once('footer_vehicle.php')?>