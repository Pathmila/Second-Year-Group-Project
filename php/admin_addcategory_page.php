<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body> 
        <div class="container">
        <form>
            <label style="font-size:30px" align="center">Add Category</label>
            <div class="row">
            <div class="col-25">
                <label for="fname">Category Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="Category name.." required>
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
                <br /><input type="submit" value="Submit">
            </div>
        </form>
        </div>
    </body>
</html>
