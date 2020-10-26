<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$uid=$_SESSION['uid'];
?>

<?php 	
	$sql1="select * from user where uid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $name=$row1['name'];
        $address=$row1['address'];
        $email=$row1['email'];
        $telephone=$row1['telephone'];
    }
?>
<?php include('../../public/html/admin_user_moredetails_page.html')?>
<?php require_once('footer.php')?>