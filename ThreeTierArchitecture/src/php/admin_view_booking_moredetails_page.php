<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
	$userid=$_SESSION['userid'];
?> 

<?php 	
	$sql1="select * from user where uid='".$userid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $name=$row1['name'];
        $address=$row1['address'];
        $email=$row1['email'];
        $telephone=$row1['telephone'];
    }
	
	$sql="select * from resavation order by resvid desc";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$resvid=$row['resvid'];
		$packid=$row['packid'];
		$date=$row['date'];
		$travelers=$row['travelers'];
		$singlerooms=$row['singlerooms'];
		$doublerooms=$row['doublerooms'];
		$familyrooms=$row['familyrooms'];
	}
	
	$sql3="select * from package where packid='".$packid."'";
	$result3=$connection->query($sql3);
	while($row=$result3->fetch_assoc()){
		$pack=(string)$row['name'];
		$price=(string)$row['price'];
	}
?>


<?php include('../../public/html/admin_view_booking_moredetails_page.html')?>
<?php require_once('footer.php')?>