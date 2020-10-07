<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">
    </head>
    <body>
        <div class="topnav" id="myTopnav">
            <div class="dropdown">
                <button class="dropbtn">ADD</button>
                <div class="dropdown-content">
                    <a href="admin_addcategory_page.php">Category</a>
                    <a href="admin_addsubcategory_page.php">Subcategory</a>
                    <a href="admin_addtravelpackage_page.php">Travel Packages</a>
                    <a href="admin_adddestination_page.php">Destinations</a>
                </div>
            </div> 

        
            <div class="dropdown">
                <button class="dropbtn">UPDATE</button>
                <div class="dropdown-content">
                    <a href="admin_updatecategory_page1.php">Category</a>
                    <a href="admin_updatesubcategory_page1.php">Subcategory</a>
                    <a href="admin_updatetravelpackage_page1.php">Travel Packages</a>
                </div>
            </div> 

            <div class="dropdown">
                <button class="dropbtn">VIEW</button>
                <div class="dropdown-content">
                    <a href="#">Bookings</a>
                    <a href="admin_viewaccount.php">Accounts</a>
                    <a href="#">Reports</a>
                </div>
            </div> 

            <a href="#home">CHECK AVAILABILITY</a>

            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>


        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>

    </body>
</html>
