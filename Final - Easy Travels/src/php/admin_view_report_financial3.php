<?php
	$_GLOBAL['ID']=0;
	$_GLOBAL['max']=0;
	$_SESSION['name']="";
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

		$sql4="select * from user where name='$name' ";
		//echo $sql;
		$result4=$connection->query($sql4);
		while($row4=$result4->fetch_assoc()){					
			$uid=$row4['uid'];
			$email=$row4['email'];
		
		
			$sql1="select count(package) from assign where name='$name'";
			//echo $sql1;
			$result1=$connection->query($sql1);
			while($row1=$result1->fetch_assoc()){
				$count=$row1['count(package)'];					
				
				if($_GLOBAL['max']<$count){
					$_GLOBAL['max']=$count;
					$_GLOBAL['name']=$name;
					$_GLOBAL['email']=$email;
					$_GLOBAL['ID']=$uid;
				}	
			}
		}
	}
?>