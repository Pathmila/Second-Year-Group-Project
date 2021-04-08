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

	$sql = "select * from category";
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$img = $row['photo'];
		echo "<tr style='height:70px;'>";

		echo "<td> <form method='post' action='admin_view_category_update.php'><input name='viewticket' type='submit' id='next' value='".$row['catid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['catid']."'/></form></td>";

		echo "<td>".$row['name']."</td>";
		echo "<td><img style='width:200px; height:150px;' src='../../public/images/category/$img.jpg'></td>";
		echo "</tr>";
	}
	echo "</table></div></div>";
?>