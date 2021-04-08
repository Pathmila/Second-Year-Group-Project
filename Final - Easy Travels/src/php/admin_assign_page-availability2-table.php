<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$date=$_SESSION['reservation'];
		echo"
		<div class='container2'>			
		<div style='overflow-x:auto;'>
		<table id='table_not_available_guides' border=1 padding=50px align='center' class='viewtable'>
			<tr class='theads'>
				<th>ID</th>
				<th>Name</th>
				<th>Charge Per Day</th>
				<th>Birthday</th>
				<th>Address</th>
				<th>Email</th>
				<th>Telephone</th>
				<th>Details</th>
				<th>Photo</th>	
			</tr>";

		$path='../../public/images/guide/';
		$ex='.jpg';
		
		$sql2="select * from guide WHERE gid NOT IN (SELECT gid from guideavailability where availability_date = '".$date."')";
		//echo $sql2;
		$result2=$connection->query($sql2);
		while($row2=$result2->fetch_assoc()){			
			echo "<tr>";
			echo "<td>".$row2['gid']."</td>";
			echo "<td>".$row2['name']."</td>";
			echo "<td>".$row2['charge']."</td>";
			echo "<td>".$row2['birthday']."</td>";
			echo "<td>".$row2['address']."</td>";
			echo "<td>".$row2['email']."</td>";
			echo "<td>0".$row2['telephone']."</td>";
			echo "<td>".$row2['description']."</td>";
			$photo=$row2['photo'];
			//echo $photo;
			echo "<td><img class='image' width='100px' src='".$path.$photo.$ex."'></td>";
						
			echo "</tr>";
		}	
		echo "</table></div></div>";
		
	
?>