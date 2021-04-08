<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	if(isset($_POST['check'])){
		$date=$_POST['date'];
		echo "	
			
			<div class='container1'>			
			<form align='center' method='POST' action='../../src/php/admin_check_availability2.php'>			
				<div class='row'>
				<div class='col-25'>
					<label>Select the Vehicle:</label>
				</div>
				<div class='col-25'>
					<select name='vehicle' id='vehicle' required>";?>
						<?php include('../../src/php/admin_check_availability2-vehicle_dropbox.php')?>
					<?php 
					echo"
					</select>    
				</div>
				<div class='col-25'>
					<br />
				</div>
				<div class='col-25'>					
					<center><input type='submit' name='submit' value='Search' class='formbtn'></center>
				</div>
				</div>
			</form>
			</div>
		
		<div class='container2'>			
		<div style='overflow-x:auto;'>
		<table id='table_not_available_guides' border=1 padding=50px align='center' class='viewtable'>
			<tr class='theads'>
				<td>ID</td>
				<td>Name</td>
				<td>Charge Per 1km</td>
				<td>Address</td>
				<td>Email</td>
				<td>Telephone</td>
				<td>Type</td>
				<td>Details</td>
				<td>Photo</td>				
			</tr>
		";

		$path='../../public/images/vehicle/';
		$ex='.jpg';
		
		$sql="select * from vehicle WHERE vid NOT IN (SELECT vid from vehicleavailability where availability_date = '".$date."')";
		//echo $sql;
		$result=$connection->query($sql);
		while($row=$result->fetch_assoc()){
			echo "<tr>";
			echo "<td> <form method='post' action='admin_check_availability2.php'><input name='viewticket' type='submit' id='next' value='".$row['vid']."' class='next'>";
			echo "<input type='hidden' name='selectedID' value='".$row['vid']."'/></form></td>";

			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['charge']."</td>";
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
		echo "</table></div></div>";
	}
?>