<?php require_once('vehicle_navigation.php')?> 

<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=4){
        header('Location: login_page.php');
    }
?>
<?php
	$path='../../public/images/vehicle/';
	$ex='.jpg';
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";

	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
		$uname=(string)$row['username'];
    }
    

      	$sql="SELECT * FROM vehicle WHERE vid='".$uid."'";
        //echo $sql;
        $result=mysqli_query($connection,$sql);

		while($row=$result->fetch_assoc()){
			$vid=$row['vid'];
			//echo $uid;
			$type=$row['type'];
            $oname=$row['name'];
			$charge=$row['charge'];
            $address=$row['address'];
            $email=$row['email'];
            $telephone=$row['telephone'];
			$photo=$row['photo'];
			$details=$row['details'];
    }
?> 
<?php require_once('vehicle_view_navigation.php')?>
<?php include('../../public/html/vehicle_view_profile.html')?>
<?php require_once('footer_vehicle.php')?>