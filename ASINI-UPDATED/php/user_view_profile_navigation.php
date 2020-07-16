<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">
    </head>
    <body>
        <div class="topnav" id="myTopnav">
            <a href="user_add_comment">Add Comment</a>
            <a href="user_update_profile.php">Update Profile</a>
            <a href="user_change_password">Change Password</a>
            <a href="user_delete_profile.php">Delete Profile</a>
            

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
