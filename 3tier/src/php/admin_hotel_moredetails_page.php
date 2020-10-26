<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
	$path='../../images/hotel/';
	$ex='.jpg';
?>

<?php
	$hid=$_SESSION['hid'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];

	
	$sql1="select * from hotel where hid='".$hid."'";
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
	$sql2="select * from hotelavailability where hid='".$hid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $saroomno=$row2['singlerooms'];
		$daroomno=$row2['doublerooms'];
		$faroomno=$row2['familyrooms'];		
	}
?>

<?php include('../../public/html/admin_hotel_moredetails_page.html')?>			
<?php require_once('footer.php')?>