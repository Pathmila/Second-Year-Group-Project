<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(photo) from category";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo)'];
    $nextphoto=$maxid+1;
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['category']=$_POST['cat'];
		header("Location: admin_updatecategory_page2.php");
	}
?>
<?php include('../../public/html/admin_updatecategory_page1.html')?>
<?php require_once('footer.php')?>
