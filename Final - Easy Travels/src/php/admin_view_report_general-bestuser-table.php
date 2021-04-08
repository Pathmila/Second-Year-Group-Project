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
						<th scope='col'>User ID</th>
						<th scope='col'>Percent</th>
					</tr>
				</thead>
			<tbody>";
			
	$sql3="select count(package) from assign";
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$total=$row3['count(package)'];
		//echo $total;
	}
				
	$sql="select DISTINCT name from assign";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$name=$row['name'];

		$sql4="select uid from user where name='$name' ";
		//echo $sql;
		$result4=$connection->query($sql4);
		while($row4=$result4->fetch_assoc()){					
			$uid=$row4['uid'];
		}
		
		$sql1="select count(package) from assign where name='$name'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			$count=$row1['count(package)'];					
			$point=($count/$total)*100;
						
			echo"
				<tr style='height:$point%'>
					<th scope='row'>$uid</th>
					<td><span>$point</span></td>
				</tr>";
								
		}
	}
?>