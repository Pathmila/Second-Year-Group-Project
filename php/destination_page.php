<?php require_once('connect.php');?>
<?php require_once('user_nonnavigation.php')?> 
<html>
	<head>
		<title>EasyTravels.php</title>
		<link rel="stylesheet" type="text/css" href="../css/destination_page.css">
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
	</head>
	<body>	
		<div class="container">
			<form method="get" action="search_package_page.php">
				<label style="font-size:30px" align="center">Add Select Your Package</label>
				<div class="row">
				<div class="col-25">
					<label for="fname">Destination:</label>
				</div>
				<div class="col-75">
					<select name="destination" id="destination">
						<?php
							$sql2="select * from destination";
							$result2=$connection->query($sql2);
							while($row=$result2->fetch_assoc()){
								echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
							}
						?>
					</select>
				</div>
				</div>
				<div class="row">
					<input type="submit" name="submit" value="Search"><br />
            	</div>
			</form>
		</div>

<!--
		<table align="center" cellpadding ="10px" cellspacing="10px" style=" border-radius:10px; font-weight:bold; ">
			<label>Search </label>
			<tr>			
				<td>
					<div class="row">
					<select name="subcat" id="subcat">
						<?php
							//$sql3="select * from destination";
							//$result2=$connection->query($sql3);
							//while($row=$result2->fetch_assoc()){
							//	echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
							//}
						?>
						</select>
            		</div>
				</td>
			
				<td><button class="btnsearch">Search</button></td>
			</tr>
		</table>
		</div>
						-->			


        <?php
			$path='../images/';
			$ex='.jpg';
            $sql1="select * from destination";
			$result2=$connection->query($sql1);

			

			while($row=$result2->fetch_assoc()){

				$photo1=(string)$row['photo'];
				echo "<br />";
				echo "<table cellspacing='10px' class='table' align='center'>";
					echo "<tr>";
						echo "<th colspan='3'>".$row['name']."</th>"; 
					echo "</tr>";
					echo "<tr>";
						echo "<td><img class='image'  width='350px' height='250px' src='".$path.$photo1.$ex."'></td>";	
					echo "</tr>";
					echo "<tr>";
						echo "<td colspan='3'>".$row['description']."</td>";
					echo "</tr>";
				echo "</table>";
				echo "<br /><br />";
			}
		?>			
	</body>
</html>
<?php require_once('footer.php')?>