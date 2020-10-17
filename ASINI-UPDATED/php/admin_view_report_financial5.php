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
        <link rel="stylesheet" type="text/css" href="../css/chart.css">  	
	</head>
	<body>	
		<div class="container">	
			<h2 class="title" align="center"><label>Points for Hotel</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>Hotel ID</td>
				<td>No of Points</td>
				
			</tr>
			<?php
				$sql3="select sum(hotelrating) from comment";
				$result3=$connection->query($sql3);
				while($row3=$result3->fetch_assoc()){
					$total=$row3['sum(hotelrating)'];
				}
			
				$sql="select DISTINCT hotel from comment";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					$hotel=$row['hotel'];
					echo "<tr>";
					echo "<td align='center' >".$row['hotel']."</td>";
					
					$sql1="select sum(hotelrating) from comment where hotel='$hotel'";
					//echo $sql1;
					$result1=$connection->query($sql1);
					while($row1=$result1->fetch_assoc()){
						echo "<td align='center'>".$row1['sum(hotelrating)']."</td>";
						echo "</tr>";
						$sum=$row1['sum(hotelrating)'];		
						$point = ($sum/$total)*100;		
						
				
						//echo "skills ".$hotel."";
						echo "<tr>";
						echo "Hotel ID - $hotel<div class='container1'>";
						echo "<div class=' skills h".$hotel." '>".$point."%</div>";
						
						echo "</div>";
						
						//echo " <style>.$hotel{width: $point %; background-color: red;} </style>";
						
						
						echo " <style>.h$hotel{width: $point%; background-color: #08f;} </style>";
						echo "<br /></tr>";
					}
				}
			?>
            </table>
			</div>
        </div>
		</div>
	</body>
</html>
<?php require_once('footer.php')?>