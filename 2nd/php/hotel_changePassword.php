<?php require_once('hotel_nonnavigation.php')?> 
<?php require_once('menu.php')?>  
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_changePassword.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
	<div class="container">
		<form  method="Post">
        <h2>Hotel Update Profile</h2>
			<div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h3>Enter the Current Password </h3>
						<input class="input" type="text" name="Name">
						<span class="line"></span>
					</div>
                </div>
            </div>   
            <div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fas fa-key"></i>
					</div>
					<div>
						<h3>Enter the new Password</h3>
						<input class="input" type="text" name="Username">
						<span class="line"></span>
					</div>
				</div>
            </div>
            <div class="inlineinput">
				<div class="inputbox">
					<div class="i">
						<i class="fa fa-check-square"></i>
					</div>
					<div>
						<h3>Confirm the New Paaword</h3>
						<input class="input" type="text" name="Username">
						<span class="line"></span>
					</div>
				</div>
            </div>
            <input type="Submit" class="btn" value="SUBMIT">
		</form>		
	</div>	
		<script type="text/javascript" src="../js/main.js"></script>		
</body>
</html>
<?php require_once('footer.php')?>