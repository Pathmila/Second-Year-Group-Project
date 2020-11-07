<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('user_navigation.php')?> 
<?php require_once('user_view_profile_navigation.php')?>

<?php
	$uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];

	$uid;
	$aid;
	$GLOBAL['adone']=0;
	$GLOBAL['udone']=0;
	
	$sql1 = "select * from account where username = '$uname'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$uid = $row['uid'];
		$aid = $row['aid'];
		//echo $uid;
	}
	$_GLOBAL['adone'] = 0;	
	$_GLOBAL['udone']=0;
	
	if(isset($_GET['submit'])){
		$pass=(string)$_GET['password'];
		//echo $pass;
		//echo $password;
		if($password == $pass){
			$sql = "delete from user where uid = '$uid'";
			$result=mysqli_query($connection,$sql);
			if($result){
				$_GLOBAL['udone'] = 1;
			}else{
				$_GLOBAL['udone'] = 0;
			}
			
					
			$sql2 = "delete from account where aid = '$aid'";
			$result2=mysqli_query($connection,$sql2);
			if($result2){
				$_GLOBAL['adone'] = 1;
			}else{
				$_GLOBAL['adone'] = 0;
			}
			
			
			if (($_GLOBAL['udone'] == 1) && ($_GLOBAL['adone']==1)){
				//echo "done";
				echo "<script> alert('Successfully Deleted') </script>";
				header("Location: user_nonhome_page.php");
			}else{
				echo "<script> alert('Invalid Password') </script>";
				//echo "failed";
			}
		}else{
			echo "<script> alert('Invalid Password') </script>";
		}
	}

?>

<?php include('../../public/html/user_delete_profile.html')?>
<?php require_once('footer.php')?>
