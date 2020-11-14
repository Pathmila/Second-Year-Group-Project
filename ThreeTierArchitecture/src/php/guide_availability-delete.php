<?php require_once('guide_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
?>
<?php include('../../public/html/guide_availability-delete.html')?>
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
?>
<?php
	if(isset($_POST['formdelete'])){
		$day=$_POST['deletedate'];
		
		$_GLOBAL['ddone']=0;
		$sql2="select * from guideavailability where gid='".$uid."' and availability_date='".$day."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$gid=$row2['gid'];			
			if($gid != null){
				$_GLOBAL['ddone']=1;
			}else{
				$_GLOBAL['ddone']=0;
			}
		}
		if($_GLOBAL['ddone']==1){
			//echo $day;
			$sql3 = "delete from guideavailability where gid='".$uid."' and availability_date='".$day."' ";
			//echo $sql;
			$result3=$connection->query($sql3);
			if($result3){
				echo "<script> alert('Deletion is Sucessfull') </script>";
				//header("Location: guide_home.php");
			}else{
				//echo "failed";
				echo "<script> alert('Deletion is Failed') </script>";
			}
		}else{
			echo "<script> alert('This is not an unavailable Date.') </script>";
		}
	}
?>

<?php require_once('footer.php')?>