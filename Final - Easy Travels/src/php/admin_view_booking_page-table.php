<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$sql="select * from resavation order by resvid desc";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr class='ttext'>";

		echo "<td> <form method='post' action='admin_view_booking_page.php'><input name='viewticket' type='submit' id='next' value='".$row['resvid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['resvid']."'/></form></td>";

		echo "<td>".$row['packid']."</td>";

		$sql1 ="select name from package where packid='".$row['packid']."'";
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			$pname=$row1['name'];
		}
		echo "<td>".$pname."</td>";
		echo "<td>".$row['uid']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['travelers']."</td>";
		echo "<td>".$row['singlerooms']."</td>";
		echo "<td>".$row['doublerooms']."</td>";
		echo "<td>".$row['familyrooms']."</td>";
		echo "</tr>";
	}
?>
