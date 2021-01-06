<?php require_once('guide_navigation.php')?> 
	
<?php require_once('../../config/connect.php');
    session_start();
?>
<?php
	$path='../../public/images/guide/';
	$ex='.jpg';
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
		//echo $uid;
    }
	
	$sql1="select * from guide where gid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $photo=(string)$row1['photo'];
		//echo $photo;
    }
?>
<?php include('../../public/html/guide_home.html')?>
<?php require_once('guide_footer.php')?>