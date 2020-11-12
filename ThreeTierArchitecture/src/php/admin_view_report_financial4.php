<?php
	$_GLOBAL['ID']=0;
	$_GLOBAL['max']=0;
	$sql="select DISTINCT guide from comment";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$guideid=$row['guide'];
		
		$sql1="select sum(guiderating) from comment where guide='$guideid'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			$sum=$row1['sum(guiderating)'];		
			if($_GLOBAL['max']<$sum){
				$_GLOBAL['ID']=$guideid;
				$_GLOBAL['max']=$sum;
			}
		}
	}
	$sql3="select * from guide where gid=".$_GLOBAL['ID']."";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$_GLOBAL['name']=$row3['name'];
	}
?>