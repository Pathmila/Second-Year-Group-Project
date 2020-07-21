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
            <label style="font-size:30px" align="center">Update Category</label>
            <div class="row">
            <div class="col-25">
                <label for="fname">Category Name</label>
            </div>
            <div class="col-75">
                <select name="category" id="category">
                    <option>A</option>
                    <option>A</option>
                    <option>A</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">New Category Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="New Category name.." required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Old Photo</label>
            </div>
            <div class="col-75">
                <!-- show the photo which is in the database -->
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