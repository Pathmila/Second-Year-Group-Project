
<?php require_once('guide_navigation.php')?> 
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/view_style.css">
    </head>
    <body>     
        <?php require_once('view_navigation.php')?>
		<div class="container">
        <form method="GET" action="user_change_password.php">
            <label style="font-size:30px" align="center">Change Availability</label>

            <div class="row">
            <div class="col-25">
                <label>Yes:</label>
            </div>
            <div class="col-75">
            <input  type="radio" id="yes" name="availability" value="yes">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>No:</label>
            </div>
            <div class="col-75">
            <input  type="radio" id="yes" name="availability" value="yes">
            </div>
            </div>
            <div class="row">
				<input type="submit" name="submit" value="Update" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>