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
			<form method="post" action="admin_view_report_financial7.php">
				<h2 align="center" class="title"><label>Highest Revenue Month</label></h2>
				
				<div class="row">
				<div class="col-25">
					<label for="fname">Enter the year</label>
				</div>
				<div class="col-50">
					<input type="number" placeholder="Enter the year.." min="2019" max="2050"  name="year" required>
				</div>  
				<div class="col-25">
					&nbsp
					<input type="submit" name="submit" value="Go" class="formbtn">        
				</div>
				</div>
			
			<?php			
				if(isset($_POST['submit'])){
					$year=(String)$_POST['year'];	
					echo "<h2 class='title' align='center'><label>Payment Details For $year</label></h2>";
					$sql3="select sum(amount),date from payment where date like '%/$year'";
					$result3=$connection->query($sql3);
					while($row3=$result3->fetch_assoc()){
						$total=$row3['sum(amount)'];						
						for($month1=1; $month1<13 ; $month1++){
							if($month1<10){
								$i = "0$month1";
								$sql="select sum(amount), date from payment where ((date like '%/$i/$year'))";
							}else{
								$i = "$month1";
								$sql="select sum(amount), date from payment where ((date like '%/$i/$year'))";
							}
							//echo $sql;
							$result=$connection->query($sql);
							while($row1=$result->fetch_assoc()){
								$day1=$row1['date'];
								$sum=$row1['sum(amount)'];	
								//echo $sum;
								
								if($total != 0){
									$point= ($sum/$total)*100;	
								}else{
									//echo "No Revenue For $year";
								}
										
								if ($sum != 0){
									
									//echo $pday;
											
									if($i == "01"){
										$wordmonth1="January";
									}else if($i == "02"){
										$wordmonth1="Febuary";
									}else if($i == "03"){
										$wordmonth1="March";
									}else if($i == "04"){
										$wordmonth1="April";
									}else if($i == "05"){
										$wordmonth1="May";
									}else if($i == "06"){
										$wordmonth1="June";
									}else if($i == "07"){
										$wordmonth1="July";
									}else if($i == "08"){
										$wordmonth1="August";
									}else if($i == "09"){
										$wordmonth1="September";
									}else if($i == "10"){
										$wordmonth1="October";
									}else if($i == "11"){
										$wordmonth1="November";
									}else {
										$wordmonth1="December";
									}
														
									//echo "skills ".$guide."";
									echo "<tr>";
									echo "<div class='container1'>";
									echo "$wordmonth1<div class=' skills g".$wordmonth1." '>".$point."%</div>";						
									echo "</div>";
										
									//echo " <style>.$guide{width: $point %; background-color: orange;} </style>";
										
										
									echo " <style>.g$wordmonth1{width: $point%; background-color: #a04;} </style>";
									echo "<br /></tr>";
								}
							}
						}					
					
					}
				}
			?>
            </form>
		</div>
	</body>
</html>
<?php require_once('footer.php')?>