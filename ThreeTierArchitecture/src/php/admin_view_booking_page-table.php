<?php
	$sql="select * from resavation order by resvid desc";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['resvid']."</td>";
		echo "<td>".$row['packid']."</td>";
		echo "<td>".$row['uid']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['travelers']."</td>";
		echo "<td>".$row['singlerooms']."</td>";
		echo "<td>".$row['doublerooms']."</td>";
		echo "<td>".$row['familyrooms']."</td>";
		echo "</tr>";
	}
?>