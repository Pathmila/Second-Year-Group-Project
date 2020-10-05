<?php require_once('hotel_navigation.php')?>
<?php require_once('menu.php')?> 


<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_contactpage.css">
    </head>
    <body>
	<div class="container">
		<form  method="post" action="hotel_contact.php">
            <h2>Contact Us</h2>
			<div class="inlineinput">
				<div class="inputbox">
				<h3>User ID:</h3>
					<div>
						<input class="input" type="text" id="name" placeholder="Name" name="name" required>
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>Telephone Number:</h3>
						<input class="input" type="tel" id="telephone" name="telephone" placeholder="Telephone Number" required>
					</div>
				</div>
			</div>

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Email:</h3>
						<input class="input" type="email" id="name" placeholder="Email" name="name" required>
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>Address:</h3>
						<input class="input" type="text" id="address" placeholder="Email" name="address" required>
					</div>
				</div>
            </div>
            <div class="inlineinput">
				<div class="inputbox">	
					<div>
					<h3>Description:</h3>
						<textarea class="input" type="text" name="description" placeholder="Enter description." id="description" ROWS=“10” COLS=“80”></textarea>
					</div>
				</div>
			</div>
            <input type="Submit" class="btn" value="SUBMIT">	
		</form>		
	</div>			
</body>
</html>
<?php require_once('footer.php')?>        