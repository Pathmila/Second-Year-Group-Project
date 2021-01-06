<?php
	$sql="select * from assign where guide='".$_SESSION['uid']."'";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
			
		echo "<tr>";
		echo "<td>".$row['package']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['name']."</td>";	
		echo "<td>0".$row['telephone']."</td>";	
		echo "<td>".$row['email']."</td>";
		echo "</tr>";
	}
?>