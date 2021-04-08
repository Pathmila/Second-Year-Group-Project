<?php
	$sql="select * from assign where name='".$_SESSION['name']."' and email='".$_SESSION['email']."' order by resvid desc";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$hid=$row['hotel'];
		$sql1="select * from hotel where hid='".$hid."'";
		//echo $sql1;
		$result1=mysqli_query($connection,$sql1);
		while($row1=$result1->fetch_assoc()){
			$hotel=$row1['name'];
		}
		
		$gid=$row['guide'];
		$sql2="select * from guide where gid='".$gid."'";
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$guide=$row2['name'];
		}
		
		
		echo "<tr>";
		echo "<td>".$row['package']."</td>";
		echo "<td>".$row['price']."</td>";
		$sql2="select * from package where name='".$row['package']."'";
		//echo $sql;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			echo "<td align='center'>".$row2['days']."</td>";
		}
		echo "<td>".$row['date']."</td>";
		echo "<td>".$hotel."</td>";
		echo "<td>".$guide."</td>";		
		echo "<td>".$row['vehicle']."</td>";
		echo "</tr>";
	}
?>