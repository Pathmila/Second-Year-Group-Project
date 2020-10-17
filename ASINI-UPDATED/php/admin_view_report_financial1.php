<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
        <link rel="stylesheet" type="text/css" href="../css/chart.css">  	
	</head>
	<body>
		<div class="container">	
			<form method="post" action="admin_view_report_financial1.php">
				<h2 align="center" class="title"><label>Total Amount By Month</label></h2>
				
				<div class="row">
				<div class="col-25">
					<label for="fname">Select the Month</label>
				</div>
				<div class="col-50">
					<input type="month" name="date" required>
				</div>  
				<div class="col-25">
					&nbsp
					<input type="submit" name="submit" value="Go" class="formbtn">        
				</div>
				</div>
				
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
            </form>
		</div>

		<div class="container">	
			<h2 class="title" align="center"><label>Payment Details</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>Payment ID</td>
				<td>Amount</td>
				<td>Date</td>
			</tr>
			<?php
				$sql="select * from payment";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['pid']."</td>";
					echo "<td>".$row['amount']."</td>";
					echo "<td>".$row['date']."</td>";
					echo "</tr>";
				}
			?>
            </table>
			</div>
        </div>
		</div>
	</body>
</html>
<?php require_once('footer.php')?>