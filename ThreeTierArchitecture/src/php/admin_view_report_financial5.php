<?php
	$_GLOBAL['ID']=0;
	$_GLOBAL['max']=0;		
	$sql="select DISTINCT hotel from comment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$hotel=$row['hotel'];

		$sql1="select sum(hotelrating) from comment where hotel='$hotel'";
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			$sum=$row1['sum(hotelrating)'];		
			if($_GLOBAL['max']<$sum){
				$_GLOBAL['ID']=$hotel;
				$_GLOBAL['max']=$sum;
			}							
		}
	}
	$sql3="select * from hotel where hid=".$_GLOBAL['ID']."";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$_GLOBAL['name']=$row3['name'];
	}
?>