<?php require_once('guide_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
	$sql2="select * from guideavailability where gid='".$uid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $av=(string)$row2['availability'];
	}
?>

<?php
	if(isset($_POST['formsubmit'])){
		$availability=$_POST['availability'];
		$sql = "Update guideavailability set availability='".$availability."' where gid='".$uid."' ";
		//echo $sql;
		$result=$connection->query($sql);
		if($result){
			echo "<script> alert('Update is Sucessfull') </script>";
			header("Location: guide_home.php");
		}else{
			//echo "failed";
			echo "<script> alert('Update is Failed') </script>";
		}
	}
?>
<?php include('../../public/html/guide_change_availability.html')?>
<?php require_once('footer.php')?>