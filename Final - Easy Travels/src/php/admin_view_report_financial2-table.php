<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$sql="select * from payment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr style='height:50px;'>";
		echo "<td>".$row['pid']."</td>";
		echo "<td>".$row['amount']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "</tr>";
	}
?>