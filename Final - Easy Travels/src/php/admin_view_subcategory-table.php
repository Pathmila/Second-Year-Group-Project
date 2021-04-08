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
				<td>Description</td>
			</tr>
		";

	$sql = "select * from subcategory";
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr style='height:70px;'>";

		echo "<td> <form method='post' action='admin_view_subcategory_update.php'><input name='viewticket' type='submit' id='next' value='".$row['subcatid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['subcatid']."'/></form></td>";

		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "</tr>";
	}
	echo "</table></div></div>";
?>