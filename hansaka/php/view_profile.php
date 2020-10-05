<?php require_once('connect.php');
?>
<?php
    require_once('guide_navigation.php')?> 


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
        <form method="GET" action="payhere_page.php">
            <label style="font-size:30px" align="center">View Profile</label>
            <div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Age:</label>
            </div>
            <div class="col-75">
                <input type="text" name="age" value="<?php echo $age?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone" value="+94<?php echo $telephone?>" disabled>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="description"  disabled>
            </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Guide Availability:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="availbility" value="yes" disabled>
                </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Guide Image:</label>
            </div>
            <div class="col-75">
                 <input type="image" src="../images/avatar1.png"  style="align:center" width="48" height="48" disabled>  
            </div>
            </div>

           
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>