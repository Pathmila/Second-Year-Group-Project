<?php
	if(isset($_POST['check'])){
		$date=$_POST['date'];
		echo "	
			<tr class='subtitle'>
				<td>ID</td>
				<td>Name</td>
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
	}
?>