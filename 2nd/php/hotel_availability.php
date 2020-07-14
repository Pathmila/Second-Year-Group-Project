<?php require_once('hotel_nonnavigation.php')?> 
<?php require_once('menu.php')?> 

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_availability.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
	<div class="container">
		<form  method="Post">
			<h2>Change Availability</h2>
			</table>	
			<table class="tablestyle">
 				<tr>
   					 <th><h3>Type of the Room</h3></th>
   					 <th><h3>No of Current Available Rooms</th> 
  				</tr>
 				 <tr>
				  	<td><h3>Single Rooms :</h3></td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td><h3>Double Rooms :</h3></td>
					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
  				<tr>
    				<td><h3>Family Rooms :</h3></td>
    				<td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
			</table>	
		
			<input type="Submit" class="btn" value="Submit">
				
		</form>		
	</div>	
		<script type="text/javascript" src="../js/main.js"></script>		
</body>
</html>
<?php require_once('footer.php')?>