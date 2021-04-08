<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$sql="select * from messages order by id desc ";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr style='height:70px;'>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>0".$row['telephone']."</td>";
		echo "<td>".$row['details']."</td>";
		echo "<form method='post' action='admin_view_report_general5.php'>";
		echo "<input type='hidden' name='id' value='".$row['id']."'>";
		echo "<td><center><input type='submit' name='submit' value='Delete' class='formbtn'></center></td>";
		echo "</form>";
		echo "</tr>";
	}
?>