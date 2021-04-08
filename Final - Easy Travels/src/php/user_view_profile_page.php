<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 
<?php require_once('user_view_profile_navigation.php')?>
<?php 
	$uname=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	//echo $aid;	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$id=(string)$row['uid'];
		//echo $id;	
		$uname=(string)$row['username'];
	}
	
	$sql1="select * from user where uid='".$id."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $name=$row1['name'];
        $address=$row1['address'];
		$_SESSION['name']=$row1['name'];
        $email=$row1['email'];
		$_SESSION['email']=$row1['email'];
        $telephone=$row1['telephone'];
    }
?>
<?php include('../../public/html/user_view_profile_page.html')?>
<?php require_once('footer_user.php')?>