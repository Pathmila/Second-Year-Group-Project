<?php require_once('nonnavigation.php')?> 



<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel-signup.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
	<div class="container">
		<form  method="Post">
			<h2>Hotel Signup</h2>
			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h3>Name </h3>
						<input class="input" type="text" name="name">
						<span class="line"></span>
					</div>
				</div>
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h3>User Name </h3>
						<input class="input" type="text" name="username">
						<span class="line"></span>
					</div>
				</div>
			</div>

			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h3>Password </h3>
						<input class="input" type="password" name="password">
						<span class="line"></span>
					</div> 
				</div>	
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
					<h3>Confirm Password </h3>
						<input class="input" type="password" name="Confirmpassword">
						<span class="line"></span>
					</div>
				</div>
			</div>

			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div>
						<h3>Address</h3>
						<input class="input" type="text" name="address">
						<span class="line"></span>
					</div>
				</div>
			</div>	
			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-phone"></i>
					</div>
					<div>
						<h3>Telephone Number</h3>
						<input class="input" type="tel" name="telephone">
						<span class="line"></span>
					</div>
				</div>

				<div class="inputbox">
					<div class="i">
						<i class="fas fa-at"></i>
					</div>
					<div>
						<h3>Email</h3>
						<input class="input" type="email" name="email">
						<span class="line"></span>
					</div>
				</div>
			</div>	
			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-file"></i>	
					</div>	
					<div>
						<h3>Description</h3>
						<textarea class="input" type="text" name="description"></textarea>
						<span class="arealine"></span>
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-file"></i>	
					</div>	
					<div>
						<h3></h3>
						<input class="inputimg" type ="file" accept = "image/*" name="photo">
						<span class="line"></span>
					</div>
				</div>
			</div>	
			<table class="tablestyle">
 				<tr>
   					 <th>Type of the Room</th>
   					 <th>Number of Rooms</th> 
   					 <th>Price[RS]</th>
  				</tr>
 				 <tr>
				  	 <td>Single Rooms</td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="singlerooms">
							<span class="line"></span>
						</div>
					</td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="singleroomprice">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms</td>
					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="doublerooms">
							<span class="line"></span>
						</div>
					</td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="doubleroomprice">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms</td>
    				<td><div class="inputbox">
					   		<input class="input" typy="number" name="familyrooms">
							<span class="line"></span>
						</div>
					</td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="familyroomprice">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
			</table>	
			<table class="tablestyle">
 				<tr>
   					 <th>Type of the Room</th>
   					 <th>No of Current Available Rooms</th> 
  				</tr>
 				 <tr>
				  	<td>Single Rooms</td>
  					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms</td>
					 <td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms</td>
    				<td><div class="inputbox">
					   		<input class="input" typy="number" name="sroomno">
							<span class="line"></span>
						</div>
					</td>
  				</tr>
			</table>	
			<div class="lblstyle">
				<input type="checkbox" name="terms"> I accept terms and conditions..
			</div>

			<input type="Submit" class="btn" value="Submit">
				
		</form>		
	</div>	
		<script type="text/javascript" src="../js/main.js"></script>		
</body>
</html>
<?php require_once('footer.php')?>