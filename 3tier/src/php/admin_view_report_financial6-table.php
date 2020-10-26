<?php
	$sql3="select sum(vehiclerating) from comment";
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$total=$row3['sum(vehiclerating)'];
	}
			
	$sql="select DISTINCT vehicle from comment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$vehicle=$row['vehicle'];
		echo "<tr>";
		echo "<td align='center' >".$row['vehicle']."</td>";
					
		$sql1="select sum(vehiclerating) from comment where vehicle='$vehicle'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			echo "<td align='center'>".$row1['sum(vehiclerating)']."</td>";
			echo "</tr>";
			$sum=$row1['sum(vehiclerating)'];		
			$point = ($sum/$total)*100;		
							
			//echo "skills ".$vehicle."";
			echo "<tr>";
			echo "<div class='container1'>";
			echo "Vehicle ID - $vehicle<div class=' skills ".$vehicle." '>".$point."%</div>";
						
			echo "</div>";
						
			//echo " <style>.$vehicle{width: $point %; background-color: red;} </style>";
						
			echo " <style>.$vehicle{width: $point%; background-color: #0a0;} </style>";
			echo "<br /></tr>";
		}
	}
?>