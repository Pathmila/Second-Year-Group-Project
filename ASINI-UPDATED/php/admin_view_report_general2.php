<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body> 
		<div class="container">			
			<form align="center" method="POST" action="admin_view_report_general2.php">			
			<h2 class="title"><label>Search More Destination Details</label></h2>
				<div class="row">
				<div class="col-25">
					<label>Select the destination:</label>
				</div>
				<div class="col-50">
					<select name="destination" id="destination" required>
						<?php
						$sql3="select * from destination";
						$result2=$connection->query($sql3);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['destid'] ."'>". $row['destid'] ."  -  " .$row['name'] ."</option>" ;
						}
						?>
					</select>    
				</div>
				<div class="col-25">
					&nbsp
					<input type="submit" name="submit" value="Search" class="formbtn">
				</div>
				</div>
			</form>

			<h2 class="title" align="center"><label>User Details</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>ID</td>
				<td>Name</td>
				<td>No of Packages</td>
				
			</tr>
			<?php
			if(isset($_POST['submit'])){
				$destid = $_POST['destination'];
				
				$sql1="select * from destination where destid='$destid'";
				//echo $sql;
				$result1=$connection->query($sql1);
				while($row1=$result1->fetch_assoc()){
					echo "</tr>";
					echo "<td>".$row1['destid']."</td>";
					echo "<td>".$row1['name']."</td>";					
				}				
				
				$sql="select count(packid) from packdestination where destid='$destid'";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){					
					echo "<td align='center'>".$row['count(packid)']."</td>";
					echo "<tr>";
				}				
			}
			?>
            </table>
			</div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>


