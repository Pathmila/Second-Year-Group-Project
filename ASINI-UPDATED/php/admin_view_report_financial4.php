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
			<h2 class="title" align="center"><label>Points for Guide</label></h2>
			<div style="overflow-x:auto;">
			
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>Guide ID</td>
				<td>No of Points</td>
				
			</tr>
			<?php
				$sql3="select sum(guiderating) from comment";
				$result3=$connection->query($sql3);
				while($row3=$result3->fetch_assoc()){
					$total=$row3['sum(guiderating)'];
				}
			
				$sql="select DISTINCT guide from comment";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					$guide=$row['guide'];
					echo "<tr>";
					echo "<td align='center' >".$row['guide']."</td>";
					
					$sql1="select sum(guiderating) from comment where guide='$guide'";
					//echo $sql1;
					$result1=$connection->query($sql1);
					while($row1=$result1->fetch_assoc()){
						echo "<td align='center'>".$row1['sum(guiderating)']."</td>";
						echo "</tr>";
						$sum=$row1['sum(guiderating)'];		
						$point = ($sum/$total)*100;		
						
				
						//echo "skills ".$guide."";
						echo "<tr>";
						echo "<div class='container1'>";
						echo "Guide ID - $guide<div class=' skills g".$guide." '>".$point."%</div>";						
						echo "</div>";
						
						//echo " <style>.$guide{width: $point %; background-color: red;} </style>";
						
						
						echo " <style>.g$guide{width: $point%; background-color: red;} </style>";
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