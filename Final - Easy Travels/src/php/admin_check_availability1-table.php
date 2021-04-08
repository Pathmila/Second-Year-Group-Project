<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	if(isset($_POST['check'])){
		$date=$_POST['date'];
		echo"
		<div class='container1'>
			<form method='POST' action='../../src/php/admin_check_availability1.php'>			
				<div class='row'>
				<div class='col-25'>
					<label>Guide</label>
				</div>
				<div class='col-25'>
					<select name='guide' id='guide' required>";?>
						<?php require_once('../../src/php/admin_check_availability1-guide_dropbox.php')?>
					<?php echo"</select>    
				</div>
				<div class='col-25'>
					<br />
				</div>
				<div class='col-25'>
					<center><input type='submit' name='submit' value='Search' class='formbtn'></center>
				</div>
				</div>
			</form>
		</div>
		
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
			echo "<td> <form method='post' action='admin_check_availability1.php'><input name='viewticket' type='submit' id='next' value='".$row2['gid']."' class='next'>";
			echo "<input type='hidden' name='selectedID' value='".$row2['gid']."'/></form></td>";
			
			echo "<td>".$row2['name']."</td>";
			echo "<td>".$row2['charge']."</td>";
			echo "<td>".$row2['birthday']."</td>";
			echo "<td>".$row2['address']."</td>";
			echo "<td>".$row2['email']."</td>";
			echo "<td>0".$row2['telephone']."</td>";
			echo "<td>".$row2['description']."</td>";
			$photo=$row2['photo'];
			//echo $photo;
			echo "<td><img class='image' width='150px' src='".$path.$photo.$ex."'></td>";
						
			echo "</tr>";
		}	
		echo "</table></div></div>";
		
	}
	
?>