<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	echo"
			<div class='container8'>
			<center><table class='graph'>
				<thead>
					<tr>
						<th scope='col'>Vehicle ID</th>
						<th scope='col'>Percent</th>
					</tr>
				</thead>
			<tbody>";
			
	$sql3="select sum(vehiclerating) from comment";
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$total=$row3['sum(vehiclerating)'];
	}
			
	$sql="select DISTINCT vehicle from comment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$vehicle=$row['vehicle'];
					
		$sql1="select sum(vehiclerating) from comment where vehicle='$vehicle'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
		
			$sum=$row1['sum(vehiclerating)'];		
			$point = ($sum/$total)*100;		
							
			echo"
				<tr style='height:$point%'>
					<th scope='row'>$vehicle</th>
					<td><span>$point</span></td>
				</tr>";
		}
	}
?>