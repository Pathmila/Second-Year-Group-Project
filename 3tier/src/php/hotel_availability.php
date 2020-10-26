<?php require_once('hotel_navigation.php')?> 
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
		$sarooms=$_POST['sarooms'];
		$darooms=$_POST['darooms'];
		$farooms=$_POST['farooms'];
		$sql = "Update hotelavailability set singlerooms='".$sarooms."', doublerooms='".$darooms."', familyrooms='".$farooms."' where hid='".$uid."' ";
		echo $sql;
		$result=$connection->query($sql);
		if($result){
			echo "<script> alert('Update is Sucessfull') </script>";
			header("Location: hotel_home_page.php");
		}else{
			//echo "failed";
			echo "<script> alert('Update is Failed') </script>";
		}
	}
?>

<?php include('../../public/html/hotel_availability.html')?>
<?php require_once('footer.php')?>        