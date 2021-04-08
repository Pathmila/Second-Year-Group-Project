<?php 
	if(isset($_POST['submit'])){
		$datelike=(String)$_POST['date'];
		$array = explode("-",$datelike);
		$year= $array[0];
		$month= $array[1];
						
		if($month == "01"){
			$wordmonth="January";
		}else if($month == "02"){
			$wordmonth="Febuary";
		}else if($month == "03"){
			$wordmonth="March";
		}else if($month == "04"){
			$wordmonth="April";
		}else if($month == "05"){
			$wordmonth="May";
		}else if($month == "06"){
			$wordmonth="June";
		}else if($month == "07"){
			$wordmonth="July";
		}else if($month == "08"){
			$wordmonth="August";
		}else if($month == "09"){
			$wordmonth="September";
		}else if($month == "10"){
			$wordmonth="October";
		}else if($month == "11"){
			$wordmonth="November";
		}else {
			$wordmonth="December";
		}
							
		$sql2="select sum(amount) from payment where date like '%$month/$year'";
		//echo $sql2;
		echo "<br />";
		echo "<h3>The total amount in the month of ".$wordmonth." in ".$year."</h3>";
		$result2=$connection->query($sql2);
		while($row2=$result2->fetch_assoc()){
			$total=$row2['sum(amount)'];
		}
							
		if($total==null){
			$total="0";
		}
						
		echo "<div class='row'>";
		echo "<div class='col-25'>";
		echo "<label>Total Amount&nbsp(Rs.):</label>";
		echo "</div>";
		echo "<div class='col-75'>";											
		echo "<input type='text' value='$total' readonly>";
		echo "</div>";
		echo "</div>";
	}
?>