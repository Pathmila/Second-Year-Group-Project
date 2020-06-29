<?php require_once('user_nonnavigation.php')?> 
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/account_page.css">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <form>               
                    <p class="para">Select Your Account Type</p>
                    <br />
                    <a href="user_signup_page.php"><input type="button" value="USER" class="login-button"></a>
                    <br />
                    <input type="button" value="HOTEL" class="login-button">
                    <br />
                    <input type="button" value="GUIDE" class="login-button">
                    <br />
                    <input type="button" value="VEHICLE" class="login-button">
                    <br />
                </form>
            </div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>