<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin_topnav.css">
    </head>
    <body>
        <div class="navbar">  
            <a><img src="../images/logo-web.jpg" class="fakeimg"></a>
            <a href="admin_home_page.php"><div class="txt"><Button class="btn active">Home</button></div></a>
            <a href="user_nonhome_page.php"><div class="txt"><Button class="btn">Preview Website</button></div></a>
            <a href="login_page.php" class="right"><div class="txt"><Button class="btn">LOG OUT</button></div></a>
        </div>
    </body>
	<script>
            // Add active class to the current button (highlight it)
            var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("btn");
			//document.write(btns);
            for (var i = 0; i < 8; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
			
            if (current.length > 0) { 
                current[0].className = current[0].className.replace(" active", "");
            }
            this.className += " active";
            });
            }
        </script>
	
</html>