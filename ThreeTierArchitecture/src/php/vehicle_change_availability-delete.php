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
	if(isset($_POST['formdelete'])){
		$day=$_POST['deletedate'];
		
		$_GLOBAL['ddone']=0;
		$sql2="select * from vehicleavailability where vid='".$uid."' and availability_date='".$day."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$vid=$row2['vid'];			
			if($vid != null){
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
				//header("Location: vehicle_home_page.php");
			}else{
				//echo "failed";
				echo "<script> alert('Deletion is Failed') </script>";
			}
		}else{
			echo "<script> alert('This is not an unavailable date.') </script>";
		}
	}
?>
<?php include('../../public/html/vehicle_change_availability-delete.html')?>
<?php require_once('footer.php')?>