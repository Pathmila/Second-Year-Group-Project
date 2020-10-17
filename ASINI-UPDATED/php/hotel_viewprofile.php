<?php require_once('hotel_navigation.php')?> 

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
	
	$sql1="select * from hotel where hid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=$row1['name'];
		$email=$row1['email'];
		$address=$row1['address'];
		$telephone=$row1['telephone'];
		$photo=$row1['photo'];
		$description=$row1['description'];
		$singlerooms=$row1['singlerooms'];
		$singleroomprice=$row1['singleroomprice'];
		$doublerooms=$row1['doublerooms'];
		$doubleroomprice=$row1['doubleroomprice'];
		$familyrooms=$row1['familyrooms'];
		$familyroomprice=$row1['familyroomprice'];
		
    }
	$sql2="select * from hotelavailability where hid='".$uid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $saroomno=$row2['singlerooms'];
		$daroomno=$row2['doublerooms'];
		$faroomno=$row2['familyrooms'];		
	}
?>
<?php require_once('hotel_view_navigation.php')?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>
		<div class="container">
        <form method="post" action="hotel_viewprofile.php" enctype="multipart/form-data">
            
			<h2 align='center' class="title"><label>View Profile</label></h2>
			
			<?php
				$path='../images/hotel/';
				$ex='.jpg';
			?>
			<div class="row">
                <?php echo "<p align='center'><img class='image' width='250px'  src='".$path.$photo.$ex."'></p>";?>
            </div>

			<div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input name="name" id="name" type="text" value="<?php echo $name?>" readonly >
            </div>
            </div>		
			
			<div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input name="address" id="address" type="text" value="<?php echo $address?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input name="email" id="email" type="text" value="<?php echo $email?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Telephone No:</label>
            </div>
            <div class="col-75">
                <input name="telephone" id="telephone" type="text" value="0<?php echo $telephone?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Details:</label>
            </div>
            <div class="col-75">
                <input type="text" name="description" value="<?php echo $description?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>User Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" readonly>
            </div>
            </div>		
			
			<div class="row">
                <label style="font-weight:bold; font-size:20px;">Single Room Details</label>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of single rooms</label>
            </div>
            <div class="col-75"> 
                <input name="srooms" id="srooms" type="text" value="<?php echo $singlerooms?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a single room</label>
            </div>
            <div class="col-75">
                <input name="sprice" id="sprice" type="text" value="<?php echo $singleroomprice?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available single rooms</label>
            </div>
            <div class="col-75">
                <input name="sarooms" id="sarooms" type="text" value="<?php echo $saroomno?>" readonly>
            </div>
            </div>
			
			<div class="row">
                <label style="font-weight:bold; font-size:20px;">Double Room Details</label>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of double rooms</label>
            </div>
            <div class="col-75">
                <input name="drooms" id="drooms" type="text" value="<?php echo $doublerooms?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a double room</label>
            </div>
            <div class="col-75">
                <input name="dprice" id="dprice" type="text" value="<?php echo $doubleroomprice?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available double rooms</label>
            </div>
            <div class="col-75">
                <input name="darooms" id="darooms" type="text" value="<?php echo $daroomno?>" readonly>
            </div>
            </div>
			
			<div class="row">
                <label style="font-weight:bold; font-size:20px;">Family Room Details</label>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of family rooms</label>
            </div>
            <div class="col-75">
                <input name="frooms" id="frooms" type="text" value="<?php echo $familyrooms?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a family room</label>
            </div>
            <div class="col-75">
                <input name="fprice" id="fprice" type="text" value="<?php echo $familyroomprice?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available family rooms</label>
            </div>
            <div class="col-75">
                <input name="farooms" id="farooms" type="text" value="<?php echo $faroomno?>" readonly>
            </div>
            </div>
			
			
        </form>
        </div>		
	</body>
</html>
	

<?php require_once('footer.php')?>