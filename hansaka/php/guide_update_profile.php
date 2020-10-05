<?php require_once('connect.php');?>
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
        <form method="GET" action="user_update_profile.php">
            <label style="font-size:30px" align="center">Update Profile</label>
			            <div class="row">
            <div class="col-25">
                <label>Guide ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uid" readonly>
            </div>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name"  >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname"  >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address"  >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email"  >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone(+94):</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone"  >
            </div>
            </div>
            
            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="text" name="discription"  >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Old Guide Image:</label>
            </div>
            <div class="col-75">
                 <input type="image" src="../images/avatar1.png"  style="align:center" width="48" height="48" disabled>  
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label> Select image to upload:</label>
            </div>
            <div class="col-75">
            <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            </div>



            <div class="row">
				<input type="submit" name="updatebtn" value="Update" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>