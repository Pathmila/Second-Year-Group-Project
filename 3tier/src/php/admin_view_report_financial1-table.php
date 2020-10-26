<?php
	$sql="select * from payment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['pid']."</td>";
		echo "<td>".$row['amount']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "</tr>";
	}
?>