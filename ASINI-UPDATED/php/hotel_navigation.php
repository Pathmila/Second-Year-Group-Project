<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user_nonnavigation.css">
    </head>
    <body>

        
        <div class="navbar">  
		<div id="myDIV">
            <a><img src="../images/logo-web.jpg" class="fakeimg"></a>
            <a href="hotel_home_page.php"><div class="txt"><button class="button">Home</button></div></a>
            <a href="aboutus_hotel.php"><div class="txt"><button class=" button">ABOUT</button></div></a>
            <a href="contact_hotel_page.php"><div class="txt"><button class=" button">CONTACT</button></div></a>
			<a href="hotel_viewprofile.php"><div class="txt"><button class=" button">VIEW PROFILE</button></div></a>
            <a href="hotel_availability.php"><div class="txt"><button class=" button">CHANGE AVAILABILITY</button></div></a>
            <a href="logout.php" class="right"><div class="txt"><button>LOG OUT</button></div></a>
        </div>
		<div class="rightdate">
			<?php 
				echo date("d/m/Y");
				echo "&nbsp";
				echo "&nbsp";
				echo "&nbsp";
				date_default_timezone_set("Asia/Colombo");
				echo date("h:i:sa");
			?>				
        </div> 
		</div>
    </body>

</html>
