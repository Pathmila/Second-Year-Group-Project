<?php
	$sql1="SELECT count(uid) from user";
	//echo $sql;
	$result1=$connection->query($sql1);
	while($row1=$result1->fetch_assoc()){
		$user=$row1['count(uid)'];
		$_SESSION['u']=$user;	
	}
		
	$sql2="SELECT count(gid) from guide";
	//echo $sql;
	$result2=$connection->query($sql2);
	while($row2=$result2->fetch_assoc()){
		$guide=$row2['count(gid)'];
		$_SESSION['g']=$guide;						
	}
			
	$sql4="SELECT count(hid) from hotel";
	//echo $sql;
	$result4=$connection->query($sql4);
	while($row4=$result4->fetch_assoc()){
		$hotel=$row4['count(hid)'];
		$_SESSION['h']=$hotel;						
	}				

	$sql3="SELECT count(vid) from vehicle";
	//echo $sql;
	$result3=$connection->query($sql3);
	while($row3=$result3->fetch_assoc()){
		$vehicle=$row3['count(vid)'];
		$_SESSION['v']=$vehicle;					
	}
				
	$u = $_SESSION['u'];
	$g = $_SESSION['g'];
	$h = $_SESSION['h'];
	$v = $_SESSION['v'];
						
	$tot = $u + $g + $h + $v;
	$_SESSION['pu']= ($u/$tot)*360;
	$_SESSION['pg']= ($g/$tot)*360;
	$_SESSION['ph']= ($h/$tot)*360;
	$_SESSION['pv']= ($v/$tot)*360;
?>