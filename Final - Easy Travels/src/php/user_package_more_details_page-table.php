<?php
	$id=$_SESSION['packid'];
			
	$path='../../public/images/package/';
	$ex='.jpg';

    $sql1="select * from package where packid='".$id."'";
	$result2=$connection->query($sql1);

	//echo $sql1;

	while($row=$result2->fetch_assoc()){
		$id=(string)$row['packid'];
		$details=(string)$row['details'];
		$photo1=(string)$row['photo1'];
		$photo2=(string)$row['photo2'];
		$photo3=(string)$row['photo3'];	
		$_SESSION['name']=$row['name'];
		$_SESSION['price']=$row['price'];
		//$button="<a href='book_page.php?id=".$id."'><button>Book Now</button></a>";
		$button="<button>Book Now</button>";

		echo"
		<center><form method='GET' action='book_page.php' class='table' align='center'>
			<div class='row'>
				<br /><center class='font'>";echo $row['name']; echo "</center>
				<input type='hidden' name='name' value='".$row['name']."' readonly><br />
			</div>
			<div class='row'>
			<div class='line'>
				<div class='column'>
					<img class='image' width='100px' height='80px' src='".$path.$photo1.$ex."'>
				</div>
				<div class='column'>
					<img class='image' width='100px' height='80px' src='".$path.$photo2.$ex."'>
				</div>
				<div class='column'>
					<img class='image' width='100px' height='80px' src='".$path.$photo3.$ex."'>
				</div>
				</div>
			</div>
			<div class='row'>
				<br /><center>Number of days - ";echo $row['days']; echo "</center>
				<label></label>
				<input type='hidden' name='days' value='".$row['days']."' readonly>
			</div>
			<div class='row'>
				<center>Price for a person Rs. - ";echo $row['price']; echo "</center><br />
				<input type='hidden' name='price' value=".$row['price']." readonly>
			</div>
			<div class='row'>
				<br />$details
            	</div><br />
			<div class='row'>
				$button<br /><br />
            </div>
		</form></center><br /><br />";
	}
?>			