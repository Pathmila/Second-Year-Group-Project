<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$path='../../public/images/vehicle/';
	$ex='.jpg';
	$sql="select * from vehicle";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td> <form method='post' action='admin_viewaccount3.php'><input name='viewticket' type='submit' id='next' value='".$row['vid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['vid']."'/></form></td>";

		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['charge']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>0".$row['telephone']."</td>";
		echo "<td>".$row['type']."</td>";
		echo "<td>".$row['details']."</td>";
		$photo=$row['photo'];
		//echo $photo;
		echo "<td><img class='image' width='150px' src='".$path.$photo.$ex."'></td>";			
		echo "</tr>";
	}
?>