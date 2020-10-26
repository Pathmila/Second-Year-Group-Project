<?php require_once('vehicle_navigation.php')?> 

<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$path='../../images/vehicle/';
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
    

    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM vehicle WHERE vid='".$uid."'";
        //echo $sql;
        $result=mysqli_query($connection,$sql);

		while($row=$result->fetch_assoc()){
			$vid=$row['vid'];
			//echo $uid;
			$type=$row['type'];
            $name=$row['name'];
            $address=$row['address'];
            $email=$row['email'];
            $telephone=$row['telephone'];
			$photo=$row['photo'];
			$details=$row['details'];
        }
		$sql2="select * from vehicleavailability where vid='".$uid."'";
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
    }
?> 
<?php require_once('vehicle_view_navigation.php')?>
<?php include('../../public/html/vehicle_view_profile.html')?>
<?php require_once('footer.php')?>