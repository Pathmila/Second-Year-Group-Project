<?php
	$sql3="select * from user";
	$result2=$connection->query($sql3);
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['uid'] ."'>".$row['uid']."&nbsp&nbsp--&nbsp&nbsp" .$row['name'] ."</option>" ;
	}
?>