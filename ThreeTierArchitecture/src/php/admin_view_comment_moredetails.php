<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
	$cid=$_SESSION['cid'];
?>

<?php 
	$path='../../public/images/comment/';
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


<?php include('../../public/html/admin_view_comment_moredetails.html')?>
<?php require_once('footer.php')?>