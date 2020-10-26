<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
	$vid=$_SESSION['vid'];
?>
<?php
	$path='../../public/images/vehicle/';
	$ex='.jpg';
?>
<?php
    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM vehicle WHERE vid='".$vid."'";
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
		$sql2="select * from vehicleavailability where vid='".$vid."'";
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

<?php include('../../public/html/admin_vehicle_moredetails_page.html')?>
<?php require_once('footer.php')?>