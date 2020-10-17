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
        <link rel="stylesheet" type="text/css" href="../css/chart.css">  
	
	</head>
	<body>
		<style> 
	
			#pieSlice1 .pie{
				background-color: yellow;
				transform: rotate(<?php echo $_SESSION['pu'];?>deg);
			}
			
			#pieSlice2 {
			  transform: rotate(<?php echo $_SESSION['pu'];?>deg);
			}
			
			#pieSlice2 .pie{	
				background-color: #035FF9;
				transform: rotate(<?php echo $_SESSION['pg'];?>deg);
			}
			
			#pieSlice3 {		
				transform: rotate(<?php echo ($_SESSION['pu']+$_SESSION['pg']);?>deg);
			}
			
			#pieSlice3 .pie{
				background-color: lawngreen;
				transform: rotate(<?php echo $_SESSION['ph'];?>deg);
			}
			
			#pieSlice4 {
			  transform: rotate(<?php echo ($_SESSION['pu']+$_SESSION['pg']+$_SESSION['ph']);?>deg);
			}
			
			#pieSlice4 .pie{
				background-color: #FF1950;
				transform: rotate(<?php echo $_SESSION['pv'];?>deg);
			}
    
		</style>
		<div class="container">	
		<form align="center">	
			<div class="row">
            <div class="col-75">
				<h2 class="title"><label>Pie Chart for Account Details</label></h2>
			</div>
			<div class="col-25">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="pieSlice1" class="hold"><div class="pie"></div></div>
					<div id="pieSlice2" class="hold"><div class="pie"></div></div>
					<div id="pieSlice3" class="hold"><div class="pie"></div></div>
					<div id="pieSlice4" class="hold"><div class="pie"></div></div>
				</div>
			</div>
			</div>
			
			<div class="row">
				<h2 class="title"><label>Account Details</label></h2>
				<div style="overflow-x:auto;">
				<table border=1 padding=50px align="center" class="viewtable">
					<tr class="subtitle">
						<td class="pieword" bgcolor="yellow">No of Users</td>
						<td class="pieword" bgcolor="#035FF9">No of Guides</td>
						<td class="pieword" bgcolor="lawngreen">No of Hotels</td>
						<td class="pieword" bgcolor="#FF1950">No of Vehicles</td>
					</tr>
			
					<?php
						$sql1="SELECT count(uid) from user";
						//echo $sql;
						$result1=$connection->query($sql1);
						while($row1=$result1->fetch_assoc()){
							$user=$row1['count(uid)'];
							$_SESSION['u']=$user;
		
						}
		
						$sql2="SELECT count(gid) from guide";
						//echo $sql;
						$result2=$connection->query($sql2);
						while($row2=$result2->fetch_assoc()){
							$guide=$row2['count(gid)'];
							$_SESSION['g']=$guide;
							
						}
			
						$sql4="SELECT count(hid) from hotel";
						//echo $sql;
						$result4=$connection->query($sql4);
						while($row4=$result4->fetch_assoc()){
							$hotel=$row4['count(hid)'];
							$_SESSION['h']=$hotel;
							
						}				

						$sql3="SELECT count(vid) from vehicle";
						//echo $sql;
						$result3=$connection->query($sql3);
						while($row3=$result3->fetch_assoc()){
							$vehicle=$row3['count(vid)'];
							$_SESSION['v']=$vehicle;
							
						}
				
						$u = $_SESSION['u'];
						$g = $_SESSION['g'];
						$h = $_SESSION['h'];
						$v = $_SESSION['v'];
						
						$tot = $u + $g + $h + $v;
						$_SESSION['pu']= ($u/$tot)*360;
						$_SESSION['pg']= ($g/$tot)*360;
						$_SESSION['ph']= ($h/$tot)*360;
						$_SESSION['pv']= ($v/$tot)*360;
					?>
					<td class="pieword" bgcolor="yellow" align="center"><?php echo $_SESSION['u']?></td>
					<td class="pieword" bgcolor="#035FF9" align="center"><?php echo $_SESSION['g'] ?></td>
					<td class="pieword" bgcolor="lawngreen" align="center"><?php echo $_SESSION['h'] ?></td>
					<td class="pieword" bgcolor="#FF1950" align="center"><?php echo $_SESSION['v'] ?></td>
					<tr>
				</table>
			</div>
			</div>
		</form>
        </div>
		
			
			
			
	</body>
</html>
<?php require_once('footer.php')?>