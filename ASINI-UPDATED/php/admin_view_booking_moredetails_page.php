<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
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
            <h2 class="title"><label>Reservation No&nbsp&nbsp<?php echo $resvid?>&nbsp&nbspDetails</label></h2>
			
			<div class="row">
            <div class="col-25">
                <label>Package Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="pack" value="<?php echo $pack?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of the Package(Rs.):</label>
            </div>
            <div class="col-75">
                <input type="text" name="price" value="<?php echo $price?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Date:</label>
            </div>
            <div class="col-75">
                <input type="text" name="date" value="<?php echo $date?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of Travelers:</label>
            </div>
            <div class="col-75">
                <input type="text" name="travelers" value="<?php echo $travelers?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of Singlerooms:</label>
            </div>
            <div class="col-75">
                <input type="text" name="travelers" value="<?php echo $singlerooms?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of Doublerooms:</label>
            </div>
            <div class="col-75">
                <input type="text" name="travelers" value="<?php echo $doublerooms?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of Familyrooms:</label>
            </div>
            <div class="col-75">
                <input type="text" name="travelers" value="<?php echo $familyrooms?>" readonly>
            </div>
            </div>
			
			<h2 class="title"><label>Customer Details</label></h2>
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