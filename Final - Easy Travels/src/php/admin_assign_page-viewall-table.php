<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$sql="select * from assign";
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$resvid=$row['resvid'];
		$hid=$row['hotel'];
		$gid=$row['guide'];
		$vid=$row['vehicle'];
		$package=$row['package'];
		$price=$row['price'];
		$date=$row['date'];
		$name=$row['name'];
		$address=$row['address'];
		$email=$row['email'];
		$telephone=$row['telephone'];
	  
		$sql2="select * from guide where gid='".$gid."'";
		$result2=mysqli_query($connection,$sql2);
		while($row2=$result2->fetch_assoc()){
			$gname=$row2['name'];
		}
		$sql3="select * from hotel where hid='".$hid."'";
		$result3=mysqli_query($connection,$sql3);
		while($row3=$result3->fetch_assoc()){
			$hname=$row3['name'];
		}
		
		$sql4="select uid from user where email='".$email."'";
		$result4=mysqli_query($connection,$sql4);
		while($row4=$result4->fetch_assoc()){
			$uid=$row4['uid'];
		}
		
		
		echo "<tr>";
		echo "<td>".$resvid."</td>";
		echo "<td>".$uid."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$hid."</td>";
		echo "<td>".$hname."</td>";
		echo "<td>".$gid."</td>";
		echo "<td>".$gname."</td>";
		echo "<td>".$vid."</td>";
		echo "<td>".$package."</td>";
		echo "<td>".$price."</td>";
		echo "<td>".$date."</td>";
		
		echo "</tr>";
	}
?>