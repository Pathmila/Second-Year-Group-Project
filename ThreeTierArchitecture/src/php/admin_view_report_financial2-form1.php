<?php 
	if(isset($_POST['submit1'])){
		$date1=(String)$_POST['date1'];
		//echo $date1;
		$array = explode("-",$date1);
		$year1= $array[0];
		$month1= $array[1];
		$dayno= $array[2];
						
												
		$sql2="select sum(amount) from payment where date like '$dayno/$month1/$year1'";
		//echo $sql2;
		echo "<br />";
		echo "<h3>The total amount on ".$date1."</h3>";
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