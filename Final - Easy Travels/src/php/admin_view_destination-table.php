<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	echo"
	<div class='container2'>			
		<div style='overflow-x:auto;'>
		<table id='table_not_available_guides' border=1 padding=50px align='center' class='viewtable'>
			<tr class='theads' style='height:50px;'>
				<td>ID</td>
				<td>Name</td>
				<td>Photo</td>
			</tr>
		";

	$sql = "select * from destination";
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr style='height:70px;'>";
		$img1 = $row['photo'];
		echo "<td>".$row['destid']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td><img style='width:200px; height:150px;' src='../../public/images/destination/$img1.jpg'></td>";
		echo "</tr>";
	}
	echo "</table></div></div>";
?>
