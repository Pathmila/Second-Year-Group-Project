<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('vehicle_navigation.php')?> 

<?php
	$uname=$_SESSION['username'];
	$aid=$_SESSION['aid'];
	
	
	$sql1 = "select * from account where aid = '".$aid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$uid = $row['uid'];
		$aid = $row['aid'];
		$password=$row['password'];
		//echo $uid;
	}
	
	
	if(isset($_GET['submit'])){
		$pass=$_GET['password'];
		//echo $pass;
		//echo $password;
		if($password == $pass){
			$sql1 = "delete from vehicle where vid = '$uid'";
			$result1=mysqli_query($connection,$sql1);
			//echo $sql;
			$GLOBAL['udone'] = 1;
			//echo $GLOBAL['udone'];
			
			$sql2 = "delete from vehicleavailability where vid = '$uid'";
			$result2=mysqli_query($connection,$sql2);
			$GLOBAL['avdone'] = 1;
			
			$sql3 = "delete from account where aid = '$aid'";
			$result3=mysqli_query($connection,$sql3);
			$GLOBAL['adone'] = 1;
			//echo $GLOBAL['adone'];
		}else{
			$GLOBAL['adone']=0;
			$GLOBAL['udone']=0;
			$GLOBAL['avdone']=0;
		}
		if (($GLOBAL['udone'] == 1) && ($GLOBAL['adone']==1) && ($GLOBAL['avdone']==1)){
				//echo $GLOBAL['udone'];
				//echo $GLOBAL['adone'];
				//echo "done";
				echo "<script> alert('Successfully Deleted') </script>";
				header("Location: user_nonhome_page.php");
			}else{
				echo "<script> alert('Invalid Password') </script>";
				//echo "failed";
		}
	}
?>

<?php include('../../public/html/vehicle_delete_profile.html')?>
<?php require_once('footer.php')?>