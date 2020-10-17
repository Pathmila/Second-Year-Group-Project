<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['reservation']=$_POST['reservation'];
		//echo $_SESSION['uid'];
		$sql1="select * from resavation where resvid='".$_SESSION['reservation']."'";
		$result1=mysqli_query($connection,$sql1);
		while($row1=$result1->fetch_assoc()){ 
			$uid=$row1['uid'];
		}		
		$_SESSION['userid']=$uid;
		header("Location: admin_view_booking_moredetails_page.php");
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
			<form align="center" method="POST" action='admin_view_booking_page.php'>			
			<h2 class="title"><label>Search More Reservation Details</label></h2>
				<div class="row">
				<div class="col-25">
					<label>Select the reservation:</label>
				</div>
				<div class="col-50">
					<select name="reservation" id="reservation" required>
						<?php
						$sql3="select * from resavation";
						$result2=$connection->query($sql3);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['resvid'] ."'>" .$row['resvid'] ."</option>" ;
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
			<h2 class="title" align="center"><label>Booking Details</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>Reserved ID</td>
				<td>Package ID</td>
				<td>User ID</td>
				<td>Date</td>
				<td>Travelers</td>
				<td>No of Singlerooms</td>
				<td>No of Doublerooms</td>
				<td>No of Familyrooms</td>
			</tr>
			<?php
				$sql="select * from resavation order by resvid desc";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['resvid']."</td>";
					echo "<td>".$row['packid']."</td>";
					echo "<td>".$row['uid']."</td>";
					echo "<td>".$row['date']."</td>";
					echo "<td>".$row['travelers']."</td>";
					echo "<td>".$row['singlerooms']."</td>";
					echo "<td>".$row['doublerooms']."</td>";
					echo "<td>".$row['familyrooms']."</td>";
					echo "</tr>";
				}
			?>
            </table>
			</div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>



