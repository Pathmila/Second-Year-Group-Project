<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<?php include('../../public/html/user_search_destination_page.html')?>
<?php require_once('footer_user.php')?>