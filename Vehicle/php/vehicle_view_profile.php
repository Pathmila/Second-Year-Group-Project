<?php require_once('connect.php');
	session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php
    require_once('vehicle_navigation.php')?> 
<?php 
    $uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];
    

    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM vehicle v, account a WHERE v.vid=a.uid AND username='$uname'";
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
    }
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/view_style.css">
    </head>
    <body>     
        <?php require_once('view_navigation.php')?>
		<div class="container">
        <form method="GET" action="vehicle_view_profile.php">
            <label style="font-size:30px" align="center">View Profile</label>
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
                <input type="text" name="name" value="<?php echo $name?>" disabled>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Type:</label>
            </div>
            <div class="col-75">
                <input type="text" name="type"  value="<?php echo $type?>" disabled>
            </div>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone" value="+94<?php echo $telephone?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="description"  disabled>
            </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Vehicle Availability:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="availbility" value="yes" disabled>
                </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Image of the Vehicle:</label>
            </div>
            <div class="col-75">
                 <input type="image" src="../images/avatar1.png"  style="align:center" width="48" height="48" disabled>  
            </div>
            </div>

           
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>