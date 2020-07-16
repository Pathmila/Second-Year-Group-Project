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
                    <p class="para"> User Signup</p>
                    <div class='row'>
						<div class='col-50'>
                            <h3>Name:</h3>
                            <input name="name" id="name" placeholder="Name" type="text" required />
						</div>
						<div class='col-50'>
                            <h3>Telephone No:</h3>
                            <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required />
						</div>
                    </div>
                    <div class='row'>
						<div class='col-50'>
                            <h3>Userame:</h3>
                            <input name="uname" id="uname" placeholder="Username" type="text" required />
						</div>
						<div class='col-50'>
                            <h3>Password:</h3>
                            <input type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class='row'>
						<div class='col-50'>
                            <h3>Email:</h3>
                            <input name="email" id="email" placeholder="Email" type="email" required />
						</div>
						<div class='col-50'>
                            <h3>Confirm the Password:</h3>
                            <input type="password" placeholder="Confirm Password">
                        </div>
					</div>
                    <div class='row'>
                        <input type="button" value="SIGN IN" class="packbtn">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>