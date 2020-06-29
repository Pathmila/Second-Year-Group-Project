<?php require_once('user_nonnavigation.php')?> 
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user_signup_page.css">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <form>               
                    <p class="para"> Enter Your Details To Signup</p>
                    <h3>Name:</h3>
                    <input name="name" id="name" placeholder="Name" type="text" required />
                    <br>
                    <h3>Userame:</h3>
                    <input name="uname" id="uname" placeholder="Username" type="text" required />
                    <br>
                    <h3>Telephone No:</h3>
                    <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required />
                    <br>
                    <h3>Email:</h3>
                    <input name="email" id="email" placeholder="Email" type="email" required />
                    <br>
                    <h3>Password:</h3>
                    <input type="password" placeholder="Password">
                    <br />
                    <h3>Confirm the Password:</h3>
                    <input type="password" placeholder="Confirm Password">
                    <br /><br />
                    <input type="button" value="SIGN IN" class="login-button">
                    <br />
                </form>
            </div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>