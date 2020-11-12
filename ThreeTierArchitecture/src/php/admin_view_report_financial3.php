<?php
	$_GLOBAL['ID']=0;
	$_GLOBAL['max']=0;
	$sql="select DISTINCT uid from resavation";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$uid=$row['uid'];
					
		$sql1="select count(packid) from resavation where uid='$uid'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			$count=$row1['count(packid)'];
			
			if($_GLOBAL['max']<$count){
				$_GLOBAL['max']=$count;
				$_GLOBAL['ID']=$uid;
			}				
		}
	}
	$sql3="select * from user where uid=".$_GLOBAL['ID']."";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$_GLOBAL['name']=$row3['name'];
		$_GLOBAL['email']=$row3['email'];
	}

?>