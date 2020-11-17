<?php
	$max=0;
	$maxgid=0;
	$sql1="select distinct guide from assign";
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $gid=$row1['guide'];
		
		$sql2="select count(guide) from assign where guide='".$gid."'";
		//echo $sql2;
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){       
			$count=$row2['count(guide)'];
			if($count>$max){
				$max=$count;
				$maxgid=$gid;
			}
		}
	}
	//echo $max;
	//echo $maxgid;
	
	$sql3="select * from guide where gid='".$maxgid."'";
	//echo $sql3;
	$result3=mysqli_query($connection,$sql3);
	while($row3=$result3->fetch_assoc()){       
		$name=$row3['name'];
		$email=$row3['email'];
	}
	
?>