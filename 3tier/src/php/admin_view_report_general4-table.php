<?php
	$path='../../images/comment/';
	$ex='.jpg';	
	$sql3="select * from comment order by cid desc";
	//echo $sql3;
	$result3=$connection->query($sql3);
	while($row=$result3->fetch_assoc()){				
		echo "</tr>";
		echo "<td>".$row['cid']."</td>";		
		echo "<td>".$row['uid']."</td>";
		echo "<td>".$row['details']."</td>";
					
		$photo1=$row['photo1'];
		echo "<td><img class='image' width='150px' src='".$path.$photo1.$ex."'></td>";
		$photo2=$row['photo2'];
		echo "<td><img class='image' width='150px' src='".$path.$photo2.$ex."'></td>";
		$photo3=$row['photo3'];
		echo "<td><img class='image' width='150px' src='".$path.$photo3.$ex."'></td>";
		echo "<td>".$row['hotel']."</td>";	
					
		$hotelrating=$row['hotelrating'];
		if($hotelrating == 5){
			$HRating="Best";
		}else if($hotelrating == 4){
			$HRating="Good";
		}else if($hotelrating == 3){
			$HRating="Moderate";
		}else if($hotelrating == 2){
			$HRating="Bad";
		}else{
			$HRating="Worst";
		}
					
		echo "<td>".$HRating."</td>";
		echo "<td>".$row['guide']."</td>";
					
		$guiderating=$row['guiderating'];
		if($guiderating == 5){
			$GRating="Best";
		}else if($guiderating == 4){
			$GRating="Good";
		}else if($guiderating == 3){
			$GRating="Moderate";
		}else if($guiderating == 2){
			$GRating="Bad";
		}else{
			$GRating="Worst";
		}
					
		echo "<td>".$GRating."</td>";
		echo "<td>".$row['vehicle']."</td>";
					
		$vehiclerating=$row['vehiclerating'];
		//echo $vehiclerating;
		if($vehiclerating == 5){
			$VRating="Best";
		}else if($vehiclerating == 4){
			$VRating="Good";
		}else if($vehiclerating == 3){
			$VRating="Moderate";
		}else if($vehiclerating == 2){
			$VRating="Bad";
		}else{
			$VRating="Worst";
		}
				
		echo "<td>".$VRating."</td>";
		echo "<tr>";						
	}
?>	