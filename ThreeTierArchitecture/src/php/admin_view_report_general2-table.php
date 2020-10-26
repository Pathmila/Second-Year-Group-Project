<?php
	if(isset($_POST['submit'])){
		$destid = $_POST['destination'];
				
		$sql1="select * from destination where destid='$destid'";
		//echo $sql;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			echo "</tr>";
			echo "<td>".$row1['destid']."</td>";
			echo "<td>".$row1['name']."</td>";					
		}				
				
		$sql="select count(packid) from packdestination where destid='$destid'";
		//echo $sql;
		$result=$connection->query($sql);
		while($row=$result->fetch_assoc()){					
			echo "<td align='center'>".$row['count(packid)']."</td>";
			echo "<tr>";
		}				
	}
?>