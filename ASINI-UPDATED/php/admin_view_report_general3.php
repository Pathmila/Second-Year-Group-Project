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

			<h2 class="title" align="center"><label>Most Popoular Packages</label></h2>
			
			<div style="overflow-x:auto;">
			<table id="tablePack" border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>ID</td>
				<td>Name</td>
				<td>No of Bookings</td>
				
			</tr>
			<?php
				$sql3="select count(packid) from resavation";
				$result3=$connection->query($sql3);
				while($row3=$result3->fetch_assoc()){
					$total=$row3['count(packid)'];
					//echo $total;
				}
	
				$sql3="select DISTINCT packid from resavation order by packid asc";
				//echo $sql3;
				$result3=$connection->query($sql3);
				while($row3=$result3->fetch_assoc()){
					$packid = $row3['packid'];
					echo "</tr>";
					echo "<td>".$row3['packid']."</td>";		
								
					
					$sql="select name from package where packid='$packid' ";
					//echo $sql;
					$result=$connection->query($sql);
					while($row=$result->fetch_assoc()){					
						echo "<td>".$row['name']."</td>";
						
					}

					$sql1="select count(packid) from resavation where packid ='$packid' ";
					//echo $sql1;
					$result1=$connection->query($sql1);
					while($row1=$result1->fetch_assoc()){
						$count = $row1['count(packid)'];
						echo "<td align='center'>".$row1['count(packid)']."</td>";		
						echo "<tr>";
						
						$point=($count/$total)*100;
						
						echo "<tr>";
						
						echo "<div class='container1'>";
						echo "Package ID - $packid<div class=' skills p".$packid."'>".$point."%</div>";						
						echo "</div>";
						
						//echo " <style>.$hotel{width: $point %; background-color: red;} </style>";
												
						echo " <style>.p$packid {width: $point%; background-color: #B21;} </style>";
						echo "<br /></tr>";
					}					
				}
			?>
			
			
			
			
            </table>
			</div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>


