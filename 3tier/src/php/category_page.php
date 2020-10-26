<?php require_once('connect.php');
    session_start();
 ?>
<?php require_once('user_nonnavigation.php')?> 
<?php 
    if(isset($_GET['submit'])){
        $_SESSION['cate']=$_GET['cat'];
        $_SESSION['subcate']=$_GET['subcat'];
		header("Location: package_page.php");
    }
?>
<?php include('../../public/html/category_page.html')?>
<?php require_once('footer.php')?>
