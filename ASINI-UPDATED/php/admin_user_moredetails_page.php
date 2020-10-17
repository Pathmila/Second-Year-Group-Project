<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$uid=$_SESSION['uid'];
?>

<?php 	
	$sql1="select * from user where uid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $name=$row1['name'];
        $address=$row1['address'];
        $email=$row1['email'];
        $telephone=$row1['telephone'];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
		<div class="container">
        <form method="GET" action="view_profile_page.php">
            <h2 align="center" class="title"><label><?php echo $name?> &nbsp-&nbsp View Profile</label></h2>
            <div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" readonly>
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
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>