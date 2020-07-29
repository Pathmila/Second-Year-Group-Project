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
                    <a href="admin_addcategory_page">Category</a>
                    <a href="admin_addsubcategory_page">Subcategory</a>
                    <a href="admin_addtravelpackage_page">Travel Packages</a>
                    <a href="admin_adddestination_page">Destinations</a>
                </div>
            </div> 

        
            <div class="dropdown">
                <button class="dropbtn">UPDATE</button>
                <div class="dropdown-content">
                    <a href="admin_updatecategory_page1">Category</a>
                    <a href="admin_updatesubcategory_page1">Subcategory</a>
                    <a href="admin_updatetravelpackage_page1">Travel Packages</a>
                </div>
            </div> 


            <div class="dropdown">
                <button class="dropbtn">DELETE</button>
                <div class="dropdown-content">
                    <a href="admin_deletecategory_page1">Category</a>
                    <a href="admin_deletesubcategory_page1">Subcategory</a>
                    <a href="admin_deletetravelpackage_page1">Travel Packages</a>
                </div>
            </div> 


            <div class="dropdown">
                <button class="dropbtn">VIEW</button>
                <div class="dropdown-content">
                    <a href="#">Bookings</a>
                    <a href="#">Accounts</a>
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
