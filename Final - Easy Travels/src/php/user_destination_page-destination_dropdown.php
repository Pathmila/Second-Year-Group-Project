<?php
	$sql2="select * from destination";
	$result2=$connection->query($sql2);
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
	}
?>