<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=3){
        header('Location: login_page.php');
    }
?>

<?php require_once('hotel_navigation.php')?> 
<?php require_once('hotel_view_navigation.php')?>

<?php
	$path='../../public/images/hotel/';
	$ex='.jpg';
?>
			
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";

	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
		$uname=(string)$row['username'];
    }
	
	$sql1="select * from hotel where hid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=$row1['name'];
		$email=$row1['email'];
		$address=$row1['address'];
		$telephone=$row1['telephone'];
		$photo=$row1['photo'];
		$description=$row1['description'];
		$singlerooms=$row1['singlerooms'];
		$singleroomprice=$row1['singleroomprice'];
		$doublerooms=$row1['doublerooms'];
		$doubleroomprice=$row1['doubleroomprice'];
		$familyrooms=$row1['familyrooms'];
		$familyroomprice=$row1['familyroomprice'];
		
    }
?>

<?php include('../../public/html/hotel_viewprofile.html')?>	
<?php require_once('footer_hotel.php')?>        