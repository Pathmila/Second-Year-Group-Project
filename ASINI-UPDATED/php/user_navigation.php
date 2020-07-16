<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user_nonnavigation.css">
    </head>
    <body>

<!--    <div class="navbar"> 
        <div id="myDIV">  
            <a href="#"><button class="btn">Home</button></a>
            <a href="#"><button class="btn">Packages</button></a>
            <a href="#"><button class="btn">Destinations</button></a>
            <a href="#"><button class="btn">About</button></a>
            <a href="#"><button class="btn">Contact</button></a>
            <a href="#"><button class="btn">LOG OUT</button></a>
        </div>
        </div>
        <script>
            // Add active class to the current button (highlight it)
            var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            if (current.length > 0) { 
                current[0].className = current[0].className.replace(" active", "");
            }
            this.className += " active";
            });
            }
        </script>
-->
        
        <div class="navbar">  
        <div id="myDIV">
            <a><img src="../images/logo-web.jpg" class="fakeimg"></a>
            <a href="user_home_page.php"><div class="txt"><Button class="btn active">Home</button></div></a>
            <a href="user_category_page.php"><div class="txt"><Button class=" btn">Packages</button></div></a>
            <a href="user_destination_page.php"><div class="txt"><Button class=" btn">Destinations</button></div></a>
            <a href="about_page.php"><div class="txt"><Button class=" btn">About</button></div></a>
            <a href="user_contact_page.php"><div class="txt"><Button class=" btn">Contact</button></div></a>
            <a href="view_profile_page.php"><div class="txt"><Button class=" btn">View Profile</button></div></a>
            <a href="user_nonhome_page.php" class="right"><div class="txt"><Button>LOG OUT</button></div></a>
        </div>
        </div>
    </body>
    

</html>