<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('vehicle_navigation.php')?> 

<?php
	$uname=$_SESSION['username'];
	$aid=$_SESSION['aid'];
	$password=$_SESSION['pwd'];
	
	$sql1 = "select * from account where aid = '".$aid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$_SESSION['id'] = $row['uid'];
		$aid = $row['aid'];
		//echo $uid;
	}
	$uid=$_SESSION['id'];
	
	if(isset($_GET['submit'])){
		$pass=$_GET['password'];
		//echo $pass;
		//echo $password;
		$_GLOBAL['checkbooking']=checkbooking($connection,$uid);
		
		if(($password == $pass) && ($_GLOBAL['checkbooking']==1)){
			$sql1 = "delete from vehicle where vid = '$uid'";
			$result1=mysqli_query($connection,$sql1);
			if($result1){
				$_GLOBAL['udone'] = 1;
			}else{
				$_GLOBAL['udone'] = 0;
			}
			
			$sql2 = "delete from vehicleavailability where vid = '$uid'";
			$result2=mysqli_query($connection,$sql2);
			if($result2){
				$_GLOBAL['avdone'] = 1;
			}else{
				$_GLOBAL['avdone'] = 0;
			}
			
			$sql3 = "delete from account where aid = '$aid'";
			$result3=mysqli_query($connection,$sql3);
			if($result3){
				$_GLOBAL['adone'] = 1;
			}else{
				$_GLOBAL['adone'] = 0;
			}
			
			if (($_GLOBAL['udone'] == 1) && ($_GLOBAL['adone']==1) && ($_GLOBAL['avdone']==1)){
				echo "<script> alert('Successfully Deleted') </script>";
				header("Location: user_nonhome_page.php");
			}
			
		}else if($password != $pass){
			echo "<script> alert('Invalid Password') </script>";
		}else{
			//echo "asini";
			echo "<script> alert('You have bookings') </script>";
		}			
	}
?>

<?php
	function checkbooking($connection,$uid){
		$sql="select name from assign where vehicle='".$uid."'";
		$result=mysqli_query($connection,$sql);
		while($row=$result->fetch_assoc()){
			$name=$row['name'];
			if($name == null){
				return 1;
			}else{
				return 0;
			}
		}
	}
?>

<?php include('../../public/html/vehicle_delete_profile.html')?>
<?php require_once('footer.php')?>