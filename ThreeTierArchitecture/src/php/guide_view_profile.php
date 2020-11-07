<?php require_once('guide_navigation.php')?> 
<?php require_once('../../config/connect.php');
    session_start();
?>
<?php require_once('guide_view_navigation.php')?>
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
		$uname=(string)$row['username'];
    }
	
	$sql1="select * from guide where gid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=(string)$row1['name'];
		$dob=(string)$row1['birthday'];
		$address=(string)$row1['address'];
		$telephone=(string)$row1['telephone'];
		$email=(string)$row1['email'];
		$description=(string)$row1['description'];
		$photo1=(string)$row1['photo'];
		//echo $photo1;
    }
	$sql2="select * from guideavailability where gid='".$uid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $av=(string)$row2['availability'];
		//echo $av;
		if($av=="1"){
			$avail="Yes";
		}else if($av == "0"){
			$avail="No";
		}else{
		}
	}
?>

<?php include('../../public/html/guide_view_profile.html')?>
<?php require_once('footer.php')?>
