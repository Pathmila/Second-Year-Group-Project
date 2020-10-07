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
			<h2 align="center" style="font-size:30px; color:Orange"><label>Vehicle Details</label></h2>
			<table border=1 padding=50px align="center" style="color:white;border-color:gray">
			<tr style="color:yellow; font-weight:bold">
				<td>ID</td>
				<td>Name</td>
				<td>Address</td>
				<td>Email</td>
				<td>Telephone(+94)</td>
				<td>Type</td>
				<td>Details</td>
				<td>Photo</td>
				
			</tr>
			<?php
				$path='../images/vehicle/';
				$ex='.jpg';
				$sql="select * from ".$type."";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['vid']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['telephone']."</td>";
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
    </body>
</html>



