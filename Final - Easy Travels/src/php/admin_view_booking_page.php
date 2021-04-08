<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['reservation']=$_POST['reservation'];
		$sql1="select * from resavation where resvid='".$_SESSION['reservation']."'";
		$result1=mysqli_query($connection,$sql1);
		while($row1=$result1->fetch_assoc()){ 
			$_SESSION['userid']=$row1['uid'];
		}		
		header("Location: admin_view_booking_moredetails_page.php");
	}
	if(isset($_POST['viewticket'])){
    	$next= $_POST['selectedID'];
    	$_SESSION['reserv']=$next;
    	//echo $_SESSION['reserv'];
    	$sql2="select * from resavation where resvid='".$_SESSION['reserv']."'";
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){ 
			$_SESSION['userid1']=$row2['uid'];
		}	
		//echo $_SESSION['userid1'];
		//echo $_SESSION['userid1'];
    	header("Location: admin_view_booking_moredetails_page2.php");
	}
?>
<?php include('../../public/html/admin_view_booking_page.html')?>




