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
			<h2 class="title" align="center"><label>User & Packages</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>User ID</td>
				<td>No of Packages Booked</td>
				
			</tr>
			<?php
				$sql3="select count(packid) from resavation";
				$result3=$connection->query($sql3);
				while($row3=$result3->fetch_assoc()){
					$total=$row3['count(packid)'];
					//echo $total;
				}
				
				$sql="select DISTINCT uid from resavation";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					$uid=$row['uid'];
					echo "<tr>";
					echo "<td align='center' >".$row['uid']."</td>";
					
					$sql1="select count(packid) from resavation where uid='$uid'";
					//echo $sql1;
					$result1=$connection->query($sql1);
					while($row1=$result1->fetch_assoc()){
						$count=$row1['count(packid)'];
						echo "<td align='center'>".$count."</td>";
						echo "</tr>";
						
						$point=($count/$total)*100;
						
						echo "<tr>";
						echo "<div class='container1'>";
						echo "User ID - $uid<div class=' skills u".$uid." '>".$point."%</div>";
						
						echo "</div>";
						
						//echo " <style>.$hotel{width: $point %; background-color: red;} </style>";
						
						
						echo " <style>.u$uid {width: $point%; background-color: #92f;} </style>";
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