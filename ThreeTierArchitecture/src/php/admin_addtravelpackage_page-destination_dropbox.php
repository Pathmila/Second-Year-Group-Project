<?php
	$sql2="select * from destination";
	$result2=$connection->query($sql2);
			
	echo "<option value='null'>Not Selected</option>";
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['destid'] ."'>" .$row['name'] ."</option>" ;
	}
?>
