<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<html>
    <head>
        <title>EasyTravels.com</title>    
        <meata name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS TO CSS AND JS --->
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>
        <div class="container">
        <form>
            <label style="font-size:30px" align="center">Add Destination</label>
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" id="name" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Details</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo</label>
            </div>
            <div class="col-75">
                <input type="file" name="file" id="file" required>
            </div>
            </div>

            <div class="row">
                <br /><input type="submit" value="Submit" class="formbtn">
            </div>
        </form>
        </div>   

    </body>
</html>