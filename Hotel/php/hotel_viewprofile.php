<?php require_once('hotel_navigation.php')?> 
<?php require_once('menu.php')?>
<?php require_once('connect.php')?>


<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_viewprofile.css">
    </head>
    <body>
	<div class="container">
		<form  method="post" action="hotel_viewprofile.php">
			<h2>Viewprofile</h2>
			<div class="inlineinput">
				<div class="inputbox">
				<h3>User ID:</h3>
					<div>
						<lable class="input"  id="hid" name="hid" value="<?php echo $hid; ?>">
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>User Name:</h3>
						<lable class="input"  id="username"   name="username" value="<?php echo $username; ?>" >
					</div>
				</div>
			</div>

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Name:</h3>
						<lable class="input"  id="name"  name="name" value="<?php echo $name; ?>">
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>Address:</h3>
						<lable class="input"  id="address"  name="address" value="<?php echo $address; ?>">
					</div>
				</div>
			</div>	
			
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Telephone Number:</h3>
						<lable class="input"  id="telephone"  name="telephone" value="<?php echo $telephone; ?>">
					</div>
				</div>

				<div class="inputbox">
					<div>
						<h3>Email:</h3>
						<lable class="input"  id="email"   name="email" value="<?php echo $email; ?>">
					</div>
				</div>
			</div>	
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
					<h3>Description:</h3>
						<lable class="input"  name="description"  id="description" ROWS=“10” COLS=“80” value="<?php echo $description; ?>">
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
						<h3>Image:</h3>
						<lable class="inputimg" id="image" name="image">
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
				  	 <td>Single Rooms:</td>
  					 <td><div class="tableinputbox">
					   		<lable class="input"  id="singlerooms" name="singlerooms" value="<?php echo $singlerooms; ?>">
							
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<lable class="input"  id="singleroomprice" name="singleroomprice" value="<?php echo $singleroomprice; ?>">
					
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms:</td>
					 <td><div class="tableinputbox">
					   		<lable class="input"  id="doublerooms" name="doublerooms" value="<?php echo $doublerooms; ?>">
						
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<lable class="input"  id="doubleroomprice" name="doubleroomprice" value="<?php echo $doubleroomprice; ?>">	
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms:</td>
    				<td><div class="tableinputbox">
					   		<lable class="input"  id="familyrooms" name="familyrooms" value="<?php echo $familyrooms; ?>">
							
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<lable class="input"  id="familyroomprice" name="familyroomprice" value="<?php echo $familyroomprice; ?>">
							
						</div>
					</td>
  				</tr>
			</table>
			<table class="tablestyle">
 				<tr>
   					 <th>Type of the Room:</th>
   					 <th>No of Current Available Rooms</th> 
  				</tr>
 				 <tr>
				  	<td>Single Rooms:</td>
  					 <td><div class="tableinputbox">
					   		<lable class="input"  id="sroomno" name="sroomno" value="<?php echo $sroomno; ?>">
							
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms:</td>
					 <td><div class="tableinputbox">
							   <lable class="input"  id="droomno" name="droomno" value="<?php echo $droomno; ?>">
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms:</td>
    				<td><div class="tableinputbox">
					   		<lable class="input"  id="froomno" name="froomno" value="<?php echo $froomno; ?>">
						</div>
					</td>
  				</tr>
			</table>		
		</form>
	</div>					
</body>
</html>
	

<?php require_once('footer.php')?>