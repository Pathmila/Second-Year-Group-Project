<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['cid']=$_POST['cid'];
		//echo $_SESSION['uid'];
		header("Location: admin_view_comment_moredetails.php");
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
			<form align="center" method="POST" action='admin_view_report_general4.php'>			
			<h2 class="title"><label>View Comment</label></h2>
				<div class="row">
				<div class="col-25">
					<label>Select the Comment ID:</label>
				</div>
				<div class="col-50">
					<select name="cid" id="cid" required>
						<?php
						$sql3="select * from comment order by cid desc";
						$result2=$connection->query($sql3);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['cid'] ."'>".$row['cid']."</option>" ;
						}
						?>
					</select>    
				</div>
				<div class="col-25">
					&nbsp
					<input type="submit" name="submit" value="Search" class="formbtn">
				</div>
				</div>
			</form>
		</div>	
	
		<div class="container">			

			<h2 class="title" align="center"><label>User Comments</label></h2>
			
			<div style="overflow-x:auto;">
			<table id="tablePack" border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>Comment ID</td>
				<td>User ID</td>
				<td>Comment</td>
				<td>Photo 1</td>
				<td>Photo 2</td>
				<td>Photo 3</td>
				<td>Hotel ID</td>
				<td>Rating for Hotel</td>
				<td>Guide ID</td>
				<td>Rating for Guide</td>
				<td>Vehicle</td>
				<td>Rating for Vehicle</td>
				
			</tr>
			<?php
			$path='../images/comment/';
			$ex='.jpg';
	
			$sql3="select * from comment order by cid desc";
			//echo $sql3;
			$result3=$connection->query($sql3);
			while($row=$result3->fetch_assoc()){				
				echo "</tr>";
				echo "<td>".$row['cid']."</td>";		
				echo "<td>".$row['uid']."</td>";
				echo "<td>".$row['details']."</td>";
				
				$photo1=$row['photo1'];
				echo "<td><img class='image' width='150px' src='".$path.$photo1.$ex."'></td>";
				$photo2=$row['photo2'];
				echo "<td><img class='image' width='150px' src='".$path.$photo2.$ex."'></td>";
				$photo3=$row['photo3'];
				echo "<td><img class='image' width='150px' src='".$path.$photo3.$ex."'></td>";
				echo "<td>".$row['hotel']."</td>";	
				
				$hotelrating=$row['hotelrating'];
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
				
				echo "<td>".$HRating."</td>";
				echo "<td>".$row['guide']."</td>";
				
				$guiderating=$row['guiderating'];
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
				
				echo "<td>".$GRating."</td>";
				echo "<td>".$row['vehicle']."</td>";
				
				$vehiclerating=$row['vehiclerating'];
				//echo $vehiclerating;
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
				
				echo "<td>".$VRating."</td>";
				
				
				echo "<tr>";
								
			}
			?>			
            </table>
			</div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>


