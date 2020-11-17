<?php
	$max=0;
	$maxvid=0;
	$sql1="select distinct vehicle from assign";
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $vid=$row1['vehicle'];
		
		$sql2="select count(vehicle) from assign where vehicle='".$vid."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){       
			$count=$row2['count(vehicle)'];
			if($count>$max){
				$max=$count;
				$maxvid=$vid;
			}
		}
	}
	
	$sql3="select * from vehicle where vid='".$maxvid."'";
	//echo $sql3;
	$result3=mysqli_query($connection,$sql3);
	while($row3=$result3->fetch_assoc()){       
		$name=$row3['name'];
		$email=$row3['email'];
	}
	
?>