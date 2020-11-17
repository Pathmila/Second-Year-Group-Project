<?php
	$sql3="select * from guide";
	$result2=$connection->query($sql3);
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['gid'] ."'>".$row['gid']."&nbsp-&nbsp".$row['name']."</option>" ;
	}
?>