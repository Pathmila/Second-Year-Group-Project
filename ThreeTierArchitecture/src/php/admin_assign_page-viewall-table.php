<?php
	$sql="select * from assign";
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$hid=$row['hotel'];
		$gid=$row['guide'];
		$vid=$row['vehicle'];
		$package=$row['package'];
		$price=$row['price'];
		$date=$row['date'];
		$name=$row['name'];
		$address=$row['address'];
		$email=$row['email'];
		$telephone=$row['telephone'];
	  
		$sql2="select * from guide where gid='".$gid."'";
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$gname=$row2['name'];
		}
		$sql3="select * from hotel where hid='".$hid."'";
		$result3=mysqli_query($connection,$sql3);
		while($row3=$result3->fetch_assoc()){
			$hname=$row3['name'];
		}
		echo "<tr>";
		echo "<td>".$hid."</td>";
		echo "<td>".$hname."</td>";
		echo "<td>".$gid."</td>";
		echo "<td>".$gname."</td>";
		echo "<td>".$vid."</td>";
		echo "<td>".$package."</td>";
		echo "<td>".$price."</td>";
		echo "<td>".$date."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$address."</td>";
		echo "<td>".$email."</td>";
		echo "<td>0".$telephone."</td>";
		echo "</tr>";
	}
?>