<?php
	$path='../../images/guide/';
	$ex='.jpg';
	$sql="select * from guide g , guideavailability a where a.availability='1' and a.gid=g.gid";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['gid']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['birthday']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>0".$row['telephone']."</td>";
		echo "<td>".$row['description']."</td>";
		$photo=$row['photo'];
		//echo $photo;
		echo "<td><img class='image' width='150px' src='".$path.$photo.$ex."'></td>";
					
		echo "</tr>";
	}
?>