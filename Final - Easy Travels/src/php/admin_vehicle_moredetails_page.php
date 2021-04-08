<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
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
			$charge=$row['charge'];
            $address=$row['address'];
            $email=$row['email'];
            $telephone=$row['telephone'];
			$photo=$row['photo'];
			$details=$row['details'];
        }
    }
?> 

<?php include('../../public/html/admin_vehicle_moredetails_page.html')?>
