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
						<th scope='col'>Package</th>
						<th scope='col'>Percent</th>
					</tr>
				</thead>
			<tbody>";

	$sql5="select count(package) from assign";
	$result5=$connection->query($sql5);
	while($row5=$result5->fetch_assoc()){
		$total=$row5['count(package)'];
		//echo $total;
	}
	
	$sql3="select DISTINCT package from assign";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$package = $row3['package'];
	
		$sql4="select packid from package where name='$package' ";
		//echo $sql;
		$result4=$connection->query($sql4);
		while($row4=$result4->fetch_assoc()){					
			$packid=$row4['packid'];
		}

		$sql1="select count(package) from assign where package ='$package' ";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			$count = $row1['count(package)'];
						
			$point=($count/$total)*100;
						
			echo"
				<tr style='height:$point%'>
					<th scope='row'>$packid</th>
					<td><span>$point</span></td>
				</tr>";
		}			
	}
	echo"</table></div>";
?>