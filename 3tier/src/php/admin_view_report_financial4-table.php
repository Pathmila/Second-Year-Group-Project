<?php
	$sql3="select sum(guiderating) from comment";
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$total=$row3['sum(guiderating)'];
	}
			
	$sql="select DISTINCT guide from comment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$guide=$row['guide'];
		echo "<tr>";
		echo "<td align='center' >".$row['guide']."</td>";
					
		$sql1="select sum(guiderating) from comment where guide='$guide'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			echo "<td align='center'>".$row1['sum(guiderating)']."</td>";
			echo "</tr>";
			$sum=$row1['sum(guiderating)'];		
			$point = ($sum/$total)*100;		
		
			//echo "skills ".$guide."";
			echo "<tr>";
			echo "<div class='container1'>";
			echo "Guide ID - $guide<div class=' skills g".$guide." '>".$point."%</div>";						
			echo "</div>";
						
			//echo " <style>.$guide{width: $point %; background-color: red;} </style>";
								
			echo " <style>.g$guide{width: $point%; background-color: red;} </style>";
			echo "<br /></tr>";
		}
	}
?>