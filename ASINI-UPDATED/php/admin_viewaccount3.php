<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['vid']=$_POST['vehicle'];
		//echo $_SESSION['uid'];
		header("Location: admin_vehicle_moredetails_page.php");
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
			<form align="center" method="POST" action='admin_viewaccount3.php'>			
			<h2 class="title"><label>Search More Vehicle Details</label></h2>
				<div class="row">
				<div class="col-25">
					<label>Select the vehicle:</label>
				</div>
				<div class="col-50">
					<select name="vehicle" id="vehicle" required>
						<?php
						$sql3="select * from vehicle";
						$result2=$connection->query($sql3);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['vid'] ."'>".$row['vid']."</option>" ;
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
			<h2 class="title" align="center"><label>Vehicle Details</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>ID</td>
				<td>Name</td>
				<td>Address</td>
				<td>Email</td>
				<td>Telephone</td>
				<td>Type</td>
				<td>Details</td>
				<td>Photo</td>
				
			</tr>
			<?php
				$path='../images/vehicle/';
				$ex='.jpg';
				$sql="select * from vehicle";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['vid']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>0".$row['telephone']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['details']."</td>";
					$photo=$row['photo'];
					//echo $photo;
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


