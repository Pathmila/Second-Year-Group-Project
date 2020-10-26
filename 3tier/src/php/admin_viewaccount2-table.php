<?php
	$path='../../images/hotel/';
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