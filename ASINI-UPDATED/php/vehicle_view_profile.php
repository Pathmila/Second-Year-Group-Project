<?php require_once('vehicle_navigation.php')?> 

<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
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
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
		<div class="container">
        <form method="GET" action="vehicle_view_profile.php">
			
			<h2 align='center' class="title"><label>View Profile</label></h2>
			
			<?php
				$path='../images/vehicle/';
				$ex='.jpg';
			?>
            <div class="row">
                <?php echo "<p align='center'><img class='image' width='250px'  src='".$path.$photo.$ex."'></p>";?>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Vehicle ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="vid" value="<?php echo $vid?>"readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Owner's Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Type:</label>
            </div>
            <div class="col-75">
                <input type="text" name="type"  value="<?php echo $type?>" readonly>
            </div>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone" value="0<?php echo $telephone?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="description" value="<?php echo $details?>" readonly>
            </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Vehicle Availability:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="availbility" value="<?php echo $avail?>"  readonly>
                </div>
            </div>
			

           
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>