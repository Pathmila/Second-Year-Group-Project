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
						<th scope='col'>Guide ID</th>
						<th scope='col'>Percent</th>
					</tr>
				</thead>
			<tbody>";
			
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
		
		$sql1="select sum(guiderating) from comment where guide='$guide'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			
			$sum=$row1['sum(guiderating)'];		
			$point = ($sum/$total)*100;		
		
			echo"
				<tr style='height:$point%'>
					<th scope='row'>$guide</th>
					<td><span>$point</span></td>
				</tr>";
		}
	}
?>