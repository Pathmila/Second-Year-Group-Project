<?php require_once('hotel_navigation.php')?> 
<?php require_once('menu.php')?>
<?php require_once('connect.php')?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/hotel_availability.css">
		
    </head>
    <body>
	<div class="container">
		<form  method="post"  action="hotel_availability.php">
            <h2>Change Availability</h2>
			<table class="tablestyle">
 				<tr>
   					 <th><h3>Type of the Room</h3></th>
   					 <th><h3>No of Current Available Rooms</th> 
  				</tr>
 				 <tr>
				  	<td><h3>Single Rooms :</h3></td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td><h3>Double Rooms :</h3></td>
					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">	
						</div>
					</td>
  				</tr>
  				<tr>
    				<td><h3>Family Rooms :</h3></td>
    				<td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
						</div>
					</td>
  				</tr>
			</table>	
            <input type="Submit" class="btn" value="SUBMIT">	
		</form>		
	</div>	
		<script type="text/javascript" src="../js/main.js"></script>		
</body>
</html>
<?php require_once('footer.php')?>        