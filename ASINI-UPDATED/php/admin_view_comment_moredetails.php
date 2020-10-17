<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$cid=$_SESSION['cid'];
?>

<?php 
	$path='../images/comment/';
	$ex='.jpg';
	$sql1="select * from comment where cid='".$cid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){ 
		$uid=$row1['uid'];
        $details=$row1['details'];
        $photo1=$row1['photo1'];
        $photo2=$row1['photo2'];
        $photo3=$row1['photo3'];
		$hotel=$row1['hotel'];
		$hotelrating=$row1['hotelrating'];
		
		if($hotelrating == 5){
			$HRating="Best";
		}else if($hotelrating == 4){
			$HRating="Good";
		}else if($hotelrating == 3){
			$HRating="Moderate";
		}else if($hotelrating == 2){
			$HRating="Bad";
		}else{
			$HRating="Worst";
		}
		
		$guide=$row1['guide'];
		
		$guiderating=$row1['guiderating'];
		
		if($guiderating == 5){
			$GRating="Best";
		}else if($guiderating == 4){
			$GRating="Good";
		}else if($guiderating == 3){
			$GRating="Moderate";
		}else if($guiderating == 2){
			$GRating="Bad";
		}else{
			$GRating="Worst";
		}
		
		$vehicle=$row1['vehicle'];
		
		$vehiclerating=$row1['vehiclerating'];
		
		if($vehiclerating == 5){
			$VRating="Best";
		}else if($vehiclerating == 4){
			$VRating="Good";
		}else if($vehiclerating == 3){
			$VRating="Moderate";
		}else if($vehiclerating == 2){
			$VRating="Bad";
		}else{
			$VRating="Worst";
		}
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
            <h2 align="center" class="title"><label>Comment</label></h2>
			
			 <div class="row">
				<p align='center'><img class='image' width='150px' src="<?php echo $path.$photo1.$ex?>" >
				<img class='image' width='150px' src="<?php echo $path.$photo2.$ex?>">
				<img class='image' width='150px' src="<?php echo $path.$photo3.$ex?>"></p>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>User ID:</label>
            </div>
            <div class="col-75">
				<input type="text" name="hotel" value="<?php echo $uid?>" readonly>
            </div>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Details:</label>
            </div>
            <div class="col-75">
                <textarea name="details" readonly><?php echo $details?></textarea>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Hotel ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="hotel" value="<?php echo $hotel?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Hotel Rating:</label>
            </div>
            <div class="col-75">
                <input type="text" name="HRating" value="<?php echo $HRating?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Guide ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="guide" value="<?php echo $guide?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Guide Rating:</label>
            </div>
            <div class="col-75">
                <input type="text" name="GRating" value="<?php echo $GRating?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Vehicle:</label>
            </div>
            <div class="col-75">
                <input type="text" name="guide" value="<?php echo $vehicle?>" readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Vehicle Rating:</label>
            </div>
            <div class="col-75">
                <input type="text" name="VRating" value="<?php echo $VRating?>" readonly>
            </div>
            </div>
			
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>