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
            <label style="font-size:30px" align="center">Delete Category</label>
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
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-75">
                <select name="subcategory" id="subcategory">
                    <option>A</option>
                    <option>A</option>
                    <option>A</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Details</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="details" style="height:200px">
                    <!-- retrieve from database -->
                </textarea>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Photo</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>
            <div class="row">
                <br /><input type="submit" value="Delete">
            </div>
            </form>
        </div>    
    </body>
</html>