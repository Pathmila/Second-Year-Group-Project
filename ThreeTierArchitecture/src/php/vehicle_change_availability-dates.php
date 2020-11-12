<?php
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
	$sql2="select * from vehicleavailability where vid='".$uid."'";
	//echo $sql2;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $date=$row2['availability_date'];
		echo "<tr>";;
		echo "<td>".$date."</td>";
		echo "</tr>";;
	}
?>