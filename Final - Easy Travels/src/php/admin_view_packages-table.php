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
				<td>Category</td>
				<td>Subcategory</td>
				<td>Days</td>
				<td>Price</td>
				<td>Description</td>
				<td>Photo 1</td>
				<td>Photo 2</td>
				<td>Photo 3</td>
			</tr>
		";

	$sql = "select * from package";
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr style='height:70px;'>";
		$img1 = $row['photo1'];
		$img2 = $row['photo2'];
		$img3 = $row['photo3'];

		echo "<td> <form method='post' action='admin_view_package_update.php'><input name='viewticket' type='submit' id='next' value='".$row['packid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['name']."'/></form></td>";

		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['catname']."</td>";
		echo "<td>".$row['subcatname']."</td>";
		echo "<td>".$row['days']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['details']."</td>";
		echo "<td><img style='width:100px; height:50px;' src='../../public/images/package/$img1.jpg'></td>";
		echo "<td><img style='width:100px; height:50px;' src='../../public/images/package/$img2.jpg'></td>";
		echo "<td><img style='width:100px; height:50px;' src='../../public/images/package/$img3.jpg'></td>";
		echo "</tr>";
	}
	echo "</table></div></div>";
?>
