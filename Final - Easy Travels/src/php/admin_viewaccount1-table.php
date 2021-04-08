<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$sql="select * from user";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr class='ttext'>";
		echo "<td> <form method='post' action='admin_viewaccount1.php'><input name='viewticket' type='submit' id='next' value='".$row['uid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['uid']."'/></form></td>";

		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>0".$row['telephone']."</td>";
		echo "</tr>";
	}
?>