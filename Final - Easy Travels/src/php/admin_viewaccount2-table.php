<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$path='../../public/images/hotel/';
	$ex='.jpg';
	$sql="select * from hotel";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<tr class='ttext'>";
		echo "<td> <form method='post' action='admin_viewaccount2.php'><input name='viewticket' type='submit' id='next' value='".$row['hid']."' class='next'>";
		echo "<input type='hidden' name='selectedID' value='".$row['hid']."'/></form></td>";

		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>0".$row['telephone']."</td>";
		echo "<td>".$row['singlerooms']."</td>";
		echo "<td>".$row['singleroomprice']."</td>";
		echo "<td>".$row['doublerooms']."</td>";
		echo "<td>".$row['doubleroomprice']."</td>";
		echo "<td>".$row['familyrooms']."</td>";
		echo "<td>".$row['familyroomprice']."</td>";
		$photo=$row['photo'];
		echo "<td><img class='image' width='130px' src='".$path.$photo.$ex."'></td>";
		echo "</tr>";
	}
?>