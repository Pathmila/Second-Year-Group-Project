
<?php require_once('hotel_navigation.php')?> 
<?php require_once('menu.php')?>
<?php require_once('connect.php')?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_changepassword.css">
    </head>
    <body>
	<div class="container">
		<form  method="post" action="hotel_changePassword.php">
			<h2>Hotel Change Password</h2>
			<div class="inlineinput">
				<div class="inputbox">
				<h3>User ID:</h3>
					<div>
						<input class="input" type="text" id="uid" name="uid"  readonly>
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Enter the New Password:</h3>
						<input class="input" type="text" id="username" name="username" >
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Confirm the Password:</h3>
						<input class="input" type="text" id="password" name="password" >
					</div>
				</div>
			</div>	
            <input type="Submit" class="btn" value="SUBMIT">
		</form>		
	</div>			
</body>
</html>
<?php require_once('footer.php')?>