<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
?>
<?php
	$path='../../public/images/guide/';
	$ex='.jpg';
?>
<?php
	$gid=$_SESSION['gid'];
	
	$sql1="select * from guide where gid='".$gid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=(string)$row1['name'];
		$dob=(string)$row1['birthday'];
		$address=(string)$row1['address'];
		$telephone=(string)$row1['telephone'];
		$email=(string)$row1['email'];
		$description=(string)$row1['description'];
		$photo1=(string)$row1['photo'];
		//echo $photo1;
    }
?>

<?php include('../../public/html/admin_guide_moredetails_page.html')?>
<?php require_once('footer.php')?>
