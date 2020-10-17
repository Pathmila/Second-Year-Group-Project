<?php require_once('vehicle_navigation.php')?> 
	
<?php require_once('connect.php');
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
	
	$sql1="select * from vehicle where vid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $photo1=(string)$row1['photo'];
		//echo $photo1;
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>EasyTravels</title>
		<meta name="viewport" content = "width=divice-width , initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/guide_home_style.css">
	</head>
	<body>
	<br />
		<?php
			$path='../images/vehicle/';
			$ex='.jpg';
		?>

		<div  class="div_1">
			<?php echo "<img class='ref_img' src='".$path.$photo1.$ex."'>";?>
			<img src="../images/welcome-3.1.png" class="welcome">
		</div>


	</body>
</html>     
<?php require_once('footer.php')?>