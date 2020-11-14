<?php
	$path='../../public/images/comment/';
	$ex='.jpg';	

	if(isset($_POST['formsubmit'])){
		echo"
		<div style='overflow-x:auto;'>
		<table id='tablePack' border=1 padding=50px align='center' class='viewtable'>
			<tr class='subtitle'>
				<td>Comment ID</td>
				<td>User ID</td>
				<td>Comment</td>
				<td>Photo 1</td>
				<td>Photo 2</td>
				<td>Photo 3</td>
				<td>Hotel ID</td>
				
				<td>Guide ID</td>
				
				<td>Vehicle</td>
							
			</tr>";
		
		
		$rhotel=$_POST['hotel'];
		$rguide=$_POST['guide'];
		$rvehicle=$_POST['vehicle'];
		
		//echo $rhotel;
		
		$sql4="select * from comment where hotelrating=".$rhotel." and guiderating=".$rguide." and vehiclerating=".$rvehicle." ";
		//select * from comment where hotelrating=1 and guiderating=1 and vehiclerating=1
		//echo $sql4;
		$result4=mysqli_query($connection,$sql4);
		while($row4=$result4->fetch_assoc()){	
			echo "<tr>";
			echo "<td>".$row4['cid']."</td>";		
			echo "<td>".$row4['uid']."</td>";
			echo "<td>".$row4['details']."</td>";
			$photo1=$row4['photo1'];
			echo "<td><img class='image' width='150px' src='".$path.$photo1.$ex."'></td>";
			$photo2=$row4['photo2'];
			echo "<td><img class='image' width='150px' src='".$path.$photo2.$ex."'></td>";
			$photo3=$row4['photo3'];
			echo "<td><img class='image' width='150px' src='".$path.$photo3.$ex."'></td>";
			echo "<td>".$row4['hotel']."</td>";	
			echo "<td>".$row4['guide']."</td>";
			echo "<td>".$row4['vehicle']."</td>";
			echo "</tr>";
			
		}
	}
	echo " </table>";
?>