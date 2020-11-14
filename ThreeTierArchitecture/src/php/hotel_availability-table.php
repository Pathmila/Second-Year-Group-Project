<?php
	echo"
		<tr class='subtitle'>
			<td>Unavailable Date</td>
			<td>Unavailable Single Rooms</td>
			<td>Unavailable Double Rooms</td>
			<td>Unavailable Family Rooms</td>
		</tr>
	";
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
?>

<?php
	$sql2="select * from hotelavailability where hid='".$uid."'";
	//echo $sql2;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $date=$row2['availability_date'];
		$singlerooms=$row2['singlerooms'];
		$doublerooms=$row2['doublerooms'];
		$familyrooms=$row2['familyrooms'];
		echo "<tr>";
		echo "<td>".$date."</td>";
		echo "<td>".$singlerooms."</td>";
		echo "<td>".$doublerooms."</td>";
		echo "<td>".$familyrooms."</td>";
		echo "</tr>";
	}
?>




