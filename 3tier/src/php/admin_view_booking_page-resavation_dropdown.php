<?php
	$sql3="select * from resavation";
	$result2=$connection->query($sql3);
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['resvid'] ."'>" .$row['resvid'] ."</option>" ;
	}
?>