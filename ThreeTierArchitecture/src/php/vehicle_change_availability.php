<?php require_once('vehicle_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."'";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
?>

<?php
	if(isset($_POST['formsubmit'])){
		$day=$_POST['date'];
		//echo $day;
		$sql = "Insert into vehicleavailability(vid,availability_date) values ('".$uid."' , '".$day."') ";
		//echo $sql;
		$result=$connection->query($sql);
		if($result){
			echo "<script> alert('Update is Sucessfull') </script>";
			header("Location: vehicle_home_page.php");
		}else{
			//echo "failed";
			echo "<script> alert('Update is Failed') </script>";
		}
	}
?>
<?php
	if(isset($_POST['formdelete'])){
		$day=$_POST['deletedate'];
		
		$_GLOBAL['ddone']=0;
		$sql2="select * from vehicleavailability where vid='".$uid."' and availability_date='".$date."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$hid=$row2['hid'];			
			if($hid != null){
				$_GLOBAL['ddone']=1;
			}else{
				$_GLOBAL['ddone']=0;
			}
		}
		if($_GLOBAL['ddone']==1){
			//echo $day;
			$sql3 = "delete from vehicleavailability where vid='".$uid."' and availability_date='".$day."' ";
			//echo $sql;
			$result3=$connection->query($sql3);
			if($result3){
				echo "<script> alert('Deletion is Sucessfull') </script>";
				header("Location: vehicle_home_page.php");
			}else{
				//echo "failed";
				echo "<script> alert('Deletion is Failed') </script>";
			}
		}else{
			echo "<script> alert('Invalid Date.') </script>";
		}
	}
?>
<?php include('../../public/html/vehicle_change_availability.html')?>
<?php require_once('footer.php')?>