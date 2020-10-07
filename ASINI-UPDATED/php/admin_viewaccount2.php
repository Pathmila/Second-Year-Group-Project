<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
	$type=$_SESSION['type'];
	//echo $type;
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
			<h2 align="center" style="font-size:30px; color:Orange"><label>Hotel Details</label></h2>
			<table border=1 padding=50px align="center" style="color:white;border-color:gray">
			<tr style="color:yellow; font-weight:bold">
				<td>ID</td>
				<td>Name</td>
				<td>Address</td>
				<td>Email</td>
				<td>Telephone(+94)</td>
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
				$sql="select * from ".$type."";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['hid']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['telephone']."</td>";
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
    </body>
</html>



