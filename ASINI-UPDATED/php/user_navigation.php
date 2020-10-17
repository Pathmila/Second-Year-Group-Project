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
            <a href="user_home_page.php"><div class="txt"><Button class="btn active">Home</button></div></a>
            <a href="user_category_page.php"><div class="txt"><Button class=" btn">Packages</button></div></a>
            <a href="user_destination_page.php"><div class="txt"><Button class=" btn">Destinations</button></div></a>
            <a href="aboutus_user.php"><div class="txt"><Button class=" btn">About</button></div></a>
            <a href="contact_user_page.php"><div class="txt"><Button class=" btn">Contact</button></div></a>
            <a href="user_view_profile_page.php"><div class="txt"><Button class=" btn">View Profile</button></div></a>
            <a href="logout.php" class="right"><div class="txt"><Button>LOG OUT</button></div></a>
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