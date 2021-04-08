<?php require_once('vehicle_navigation.php')?> 
	
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=4) {
        header('Location: login_page.php');
    }
?>
<?php
	$path='../../public/images/vehicle/';
	$ex='.jpg';
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
	
	$sql1="select * from vehicle where vid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $photo1=(string)$row1['photo'];
		//echo $photo1;
    }
?>
<?php include('../../public/html/vehicle_home_page.html')?>
<?php require_once('footer_vehicle.php')?>