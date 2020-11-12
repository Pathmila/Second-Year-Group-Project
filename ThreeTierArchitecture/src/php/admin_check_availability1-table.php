<?php
	if(isset($_POST['check'])){
		$date=$_POST['date'];
		echo"
			<tr class='subtitle'>
				<th>ID</th>
				<th>Name</th>
				<th>Birthday</th>
				<th>Address</th>
				<th>Email</th>
				<th>Telephone</th>
				<th>Details</th>
				<th>Photo</th>	
			</tr>";

		$path='../../public/images/guide/';
		$ex='.jpg';
		
		$sql2="select * from guide WHERE gid NOT IN (SELECT gid from guideavailability where availability_date = '".$date."')";
		//echo $sql2;
		$result2=$connection->query($sql2);
		while($row2=$result2->fetch_assoc()){			
			echo "<tr>";
			echo "<td>".$row2['gid']."</td>";
			echo "<td>".$row2['name']."</td>";
			echo "<td>".$row2['birthday']."</td>";
			echo "<td>".$row2['address']."</td>";
			echo "<td>".$row2['email']."</td>";
			echo "<td>0".$row2['telephone']."</td>";
			echo "<td>".$row2['description']."</td>";
			$photo=$row2['photo'];
			//echo $photo;
			echo "<td><img class='image' width='150px' src='".$path.$photo.$ex."'></td>";
						
			echo "</tr>";
		}	
	}
	
?>