<?php
	$path='../../images/destination/';
	$ex='.jpg';
	$name=$_SESSION['dname'];
    $sql1="select * from destination where name='$name'";
    //echo $sql1;
	$result2=$connection->query($sql1);
	while($row=$result2->fetch_assoc()){
		$destid=(string)$row['destid'];
		//echo $_SESSION['id_dest'];
		$photo1=(string)$row['photo'];

		echo"
		<form method='GET' action='packages_for_destination_page.php' class='table' align='center'>
			<div class='row'>
				<br /><input type='text' name='name' style='font-size:35px; font-weight:bold; color:white; background-color:transparent; height:50px; text-align:center;'  value='".$row['name']."' readonly>
			</div>
			</div><br/>
			<div class='row'>
				<input type='submit' class='packbtn' name='destsubmit' value='View Travel Packages in ".$row['name']."'>
			</div>
			</div><br/>
			<div class='row'>
				<div class='line'>
					<img class='image'  width='350px' height='250px' src='".$path.$photo1.$ex."'>
				</div>
			</div>
			<div class='row'>
				<text area name=destription readonly>".$row['description']."</textarea>
			</div>
		</form><br /><br />";
	}
?>		