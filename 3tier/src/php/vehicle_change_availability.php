<?php require_once('vehicle_navigation.php')?> 
<?php 
    require_once('connect.php');
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
	$sql2="select * from vehicleavailability where vid='".$uid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $av=(string)$row2['availability'];
	}
?>

<?php
	if(isset($_POST['formsubmit'])){
		$availability=$_POST['availability'];
		$sql = "Update vehicleavailability set availability='".$availability."' where vid='".$uid."' ";
		echo $sql;
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
<?php include('../../public/html/vehicle_change_availability.html')?>
<?php require_once('footer.php')?>