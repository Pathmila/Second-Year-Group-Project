<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('user_navigation.php')?> 



<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
        <?php require_once('user_view_profile_navigation.php')?>
		<div class="container">
        <form method="GET" action="user_delete_profile.php">
            <label style="font-size:30px" align="center">Delete Profile</label>


            <h3>Enter your password to delete your account...</h3>
            <div class="row">
            <div class="col-25">
                <label>Password:</label>
            </div>
            <div class="col-75">
                <input type="text" name="password">
            </div>
            </div>
            
            <div class="row">
				<input type="submit" name="submit" value="Delete" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>