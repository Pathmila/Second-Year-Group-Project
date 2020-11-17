<?php
	$max=0;
	$maxhid=0;
	$sql1="select distinct hotel from assign";
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $hid=$row1['hotel'];
		
		$sql2="select count(hotel) from assign where hotel='".$hid."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){       
			$count=$row2['count(hotel)'];
			if($count>$max){
				$max=$count;
				$maxhid=$hid;
			}
		}
	}
	
	$sql3="select * from hotel where hid='".$maxhid."'";
	//echo $sql3;
	$result3=mysqli_query($connection,$sql3);
	while($row3=$result3->fetch_assoc()){       
		$name=$row3['name'];
		$email=$row3['email'];
	}
	
?>