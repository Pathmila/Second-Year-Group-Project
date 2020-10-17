<?php require_once('hotel_navigation.php')?> 
<?php require_once('connect.php')?>
<?php 
    require_once('connect.php');
    session_start();
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."'";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
?>

<?php
	if(isset($_POST['formsubmit'])){
		$sarooms=$_POST['sarooms'];
		$darooms=$_POST['darooms'];
		$farooms=$_POST['farooms'];
		$sql = "Update hotelavailability set singlerooms='".$sarooms."', doublerooms='".$darooms."', familyrooms='".$farooms."' where hid='".$uid."' ";
		echo $sql;
		$result=$connection->query($sql);
		if($result){
			echo "<script> alert('Update is Sucessfull') </script>";
			header("Location: hotel_home_page.php");
		}else{
			//echo "failed";
			echo "<script> alert('Update is Failed') </script>";
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/guide_signup.css">
		
    </head>
    <body>
	<div class="container">
		<form  method="post"  action="hotel_availability.php">  
			
			<h2 class="title"><label>Change Your Hotel Rooms' Availability</label></h2>
            <div class="row">
            <div class="col-25">
                <label>No of available single rooms</label>
            </div>
            <div class="col-75">
                <input name="sarooms" id="sarooms" placeholder="Enter the no of available single rooms today" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available double rooms</label>
            </div>
            <div class="col-75">
                <input name="darooms" id="darooms" placeholder="Enter the no of available double rooms today" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available family rooms</label>
            </div>
            <div class="col-75">
                <input name="farooms" id="farooms" placeholder="Enter the no of available family rooms today" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
                <input type="submit" name="formsubmit" value="Update" class="formbtn">
            </div>
		</form>		
	</div>	
		<script type="text/javascript" src="../js/main.js"></script>		
</body>
</html>
<?php require_once('footer.php')?>        