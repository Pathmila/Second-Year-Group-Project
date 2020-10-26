<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<?php include('../../public/html/user_home_page.html')?>
<?php require_once('footer.php')?>