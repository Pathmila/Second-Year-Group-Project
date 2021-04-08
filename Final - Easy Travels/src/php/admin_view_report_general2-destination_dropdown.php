<?php
	$sql3="select * from destination";
	$result2=$connection->query($sql3);
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['destid'] ."'>". $row['destid'] ."  -  " .$row['name'] ."</option>" ;
	}
?>