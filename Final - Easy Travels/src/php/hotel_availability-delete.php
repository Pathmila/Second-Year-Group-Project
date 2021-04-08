<?php require_once('hotel_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=3){
        header('Location: login_page.php');
    }
?>
<?php include('../../public/html/hotel_availability-delete.html')?>

<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."'";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=$row['uid'];
    }
	
?>

<?php
	if(isset($_POST['formdelete'])){
		$date=$_POST['deletedate'];
		
		$_GLOBAL['done']=0;
		$sql2="select * from hotelavailability where hid='".$uid."' and availability_date='".$date."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$hid=$row2['hid'];			
			if($hid != null){
				$_GLOBAL['done']=1;
			}else{
				$_GLOBAL['done']=0;
			}
		}

		if($_GLOBAL['done']==1){
			$sql3 = "delete from hotelavailability where hid='".$uid."' and availability_date='".$date."' ";
			//echo $sql;
			$result3=$connection->query($sql3);
			if($result3){
				$_SESSION['bdate']=" ";
				echo "<script> alert('Deletion is Sucessfull') </script>";
				header("Location: hotel_availability.php");
			}else{
				//echo "failed";
				$_SESSION['bdate']=" ";
				echo "<script> alert('Deletion is Failed') </script>";
			}
		}else{
			$_SESSION['bdate']=" ";
			echo "<script> alert('This is not an unavailable Date.') </script>";
		}
		
		
	}
?>
<?php require_once('footer_hotel.php')?>  