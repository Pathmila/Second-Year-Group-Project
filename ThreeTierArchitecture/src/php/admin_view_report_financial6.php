<?php
	$_GLOBAL['ID']=0;
	$_GLOBAL['max']=0;	
	$_GLOBAL['name']="";
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
			if($_GLOBAL['max']<$sum){
				$_GLOBAL['ID']=$vehicle;
				$_GLOBAL['max']=$sum;
			}								
		}
	}
	$sql3="select * from vehicle where vid='".$_GLOBAL['ID']."'";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$_GLOBAL['name']=$row3['name'];
	}
?>