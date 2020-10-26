<?php
	$path='../../images/destination/';
	$ex='.jpg';
    $sql1="select * from destination";
	$result2=$connection->query($sql1);

	while($row=$result2->fetch_assoc()){
		$photo1=(string)$row['photo'];
		$name=(string)$row['name'];
		$id=(string)$row['destid'];

		echo"
		<form name='box' method='get' action='user_destination_page.php' class='table' align='center'>
			<div class='column'>
				<div class='content'>
					<input type='text' name='destname' value='".$name."' style='font-size:25px; font-weight:bold; color:white; background-color:transparent; height:50px; text-align:center' readonly><br />
					<img src='".$path.$photo1.$ex."' class='pack-img'>
					<br /><br /><a><input type='submit' name='viewsubmit' value='View More Details' class='viewbtn'></a><br />
				</div>
			</div>   
		</form>";			
	}
?>