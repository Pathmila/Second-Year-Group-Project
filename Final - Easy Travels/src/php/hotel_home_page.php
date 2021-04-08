<?php require_once('hotel_navigation.php')?> 
	
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=3) {
        header('Location: login_page.php');
    }
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
?>
<?php
	$path='../../public/images/hotel/';
	$ex='.jpg';
?>

<?php
	
	$sql="select * from account where aid='".$aid."'";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
	
	$sql1="select * from hotel where hid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $photo1=(string)$row1['photo'];
		//echo $photo1;
	}
	$sql1="select * from hotel where hid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
		$name=$row1['name'];
	}	
?>

<?php include('../../public/html/hotel_home_page.html')?>
<?php require_once('footer_hotel.php')?>        