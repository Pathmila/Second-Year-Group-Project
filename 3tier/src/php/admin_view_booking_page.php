<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['reservation']=$_POST['reservation'];
		//echo $_SESSION['uid'];
		$sql1="select * from resavation where resvid='".$_SESSION['reservation']."'";
		$result1=mysqli_query($connection,$sql1);
		while($row1=$result1->fetch_assoc()){ 
			$uid=$row1['uid'];
		}		
		$_SESSION['userid']=$uid;
		header("Location: admin_view_booking_moredetails_page.php");
	}
?>
<?php include('../../public/html/admin_view_booking_page.html')?>
<?php require_once('footer.php')?>



