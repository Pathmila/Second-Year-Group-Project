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
						<th scope='col'>Hotel ID</th>
						<th scope='col'>Percent</th>
					</tr>
				</thead>
			<tbody>";
			
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
					
		$sql1="select sum(hotelrating) from comment where hotel='$hotel'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
		
			$sum=$row1['sum(hotelrating)'];		
			$point = ($sum/$total)*100;		
							
			echo"
				<tr style='height:$point%'>
					<th scope='row'>$hotel</th>
					<td><span>$point</span></td>
				</tr>";
		}
	}
?>