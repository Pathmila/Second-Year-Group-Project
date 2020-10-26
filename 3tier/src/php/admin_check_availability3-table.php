<?php
	$path='../../public/images/hotel/';
	$ex='.jpg';
	$sql="select DISTINCT h.hid, h.name, a.singlerooms, h.singleroomprice, a.doublerooms, h.doubleroomprice,
	a.familyrooms, h.familyroomprice from hotel h, hotelavailability a where h.hid=a.hid and 
	((a.singlerooms>0) or (a.doublerooms>0) or (a.familyrooms)>0)";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['hid']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['singlerooms']."</td>";
		echo "<td>".$row['singleroomprice']."</td>";
		echo "<td>".$row['doublerooms']."</td>";
		echo "<td>".$row['doubleroomprice']."</td>";
		echo "<td>".$row['familyrooms']."</td>";
		echo "<td>".$row['familyroomprice']."</td>";
		echo "</tr>";
	}
?>