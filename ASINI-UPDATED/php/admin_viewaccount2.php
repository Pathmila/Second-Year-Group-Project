<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>
<?php
	if(isset($_POST['submit'])){
		$_SESSION['hid']=$_POST['hotel'];
		//echo $_SESSION['uid'];
		header("Location: admin_hotel_moredetails_page.php");
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
			<form align="center" method="POST" action='admin_viewaccount2.php'>			
			<h2 class="title"><label>Search More Hotel Details</label></h2>
				<div class="row">
				<div class="col-25">
					<label>Select the hotel:</label>
				</div>
				<div class="col-50">
					<select name="hotel" id="hotel" required>
						<?php
						$sql3="select * from hotel";
						$result2=$connection->query($sql3);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['hid'] ."'>".$row['hid']."&nbsp&nbsp--&nbsp&nbsp" .$row['name'] ."</option>" ;
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
			<h2 align="center" class="title"><label>Hotel Details</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>ID</td>
				<td>Name</td>
				<td>Address</td>
				<td>Email</td>
				<td>Telephone</td>
				<td>No of Single Rooms</td>
				<td>Price of Single Room</td>
				<td>No of Double Rooms</td> 
				<td>Price of Double Room</td>
				<td>No of Family Rooms</td>
				<td>Price of Family Room</td>
				<td>Description</td>
				<td>Photo</td>
				
			</tr>
			<?php
				$path='../images/hotel/';
				$ex='.jpg';
				$sql="select * from hotel";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['hid']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>0".$row['telephone']."</td>";
					echo "<td>".$row['singlerooms']."</td>";
					echo "<td>".$row['singleroomprice']."</td>";
					echo "<td>".$row['doublerooms']."</td>";
					echo "<td>".$row['doubleroomprice']."</td>";
					echo "<td>".$row['familyrooms']."</td>";
					echo "<td>".$row['familyroomprice']."</td>";
					echo "<td>".$row['description']."</td>";
					$photo=$row['photo'];
					echo "<td><img class='image' width='150px' src='".$path.$photo.$ex."'></td>";
					
					echo "</tr>";
				}
			?>
            </table>
			</div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>


