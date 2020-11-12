<?php
	$_GLOBAL['max']=0;
	$_GLOBAL['packid']=0;
	$_GLOBAL['name']="";
	$_GLOBAL['price']=0;
	$sql="select distinct packid from resavation";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		
		$packid=$row['packid'];
		
		$sql2 = "select count(packid) from resavation where packid like $packid ";
		//echo $sql2;
		$result2=$connection->query($sql2);
		while($row2=$result2->fetch_assoc()){		
			$count=$row2['count(packid)'];
			if($count>$_GLOBAL['max']){
				$_GLOBAL['packid']=$packid;
				$_GLOBAL['max']=$count;
			}
		}
	}
	$sql3="select * from package where packid=".$_GLOBAL['packid']."";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$_GLOBAL['name']=$row3['name'];
		$_GLOBAL['price']=$row3['price'];
	}

?>
