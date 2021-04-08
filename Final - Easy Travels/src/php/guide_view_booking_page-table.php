<?php
	$sql="select * from assign where guide='".$_SESSION['uid']."' order by resvid desc";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
			
		echo "<tr>";
		echo "<td align='center'>".$row['package']."</td>";
		echo "<td align='center'>".$row['date']."</td>";

		$sql2="select * from package where name='".$row['package']."'";
		//echo $sql;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			echo "<td align='center'>".$row2['days']."</td>";
		}

		echo "<td align='center'>".$row['name']."</td>";	
		echo "<td align='center'>0".$row['telephone']."</td>";	
		echo "<td align='center'>".$row['email']."</td>";
		echo "</tr>";
	}
?>