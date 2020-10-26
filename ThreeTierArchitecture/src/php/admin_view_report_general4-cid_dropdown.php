<?php
	$sql3="select * from comment order by cid desc";
	$result2=$connection->query($sql3);
	while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['cid'] ."'>".$row['cid']."</option>" ;
	}
?>