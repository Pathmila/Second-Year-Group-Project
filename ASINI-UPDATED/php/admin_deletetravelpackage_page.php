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
            <label style="font-size:30px" align="center">Delete Travel Package</label>
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
                <label for="fname">Package Name</label>
            </div>
            <div class="col-75">
                <select name="package" id="package">
                    <option>A</option>
                    <option>A</option>
                    <option>A</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 1</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 2</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 3</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 4</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 5</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">No of Days</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Package Price</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Details</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Photo 1</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Photo 2</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Photo 3</label>
            </div>
            <div class="col-75">
                <!-- retrieve from database -->
            </div>
            </div>

            <div class="row">
                <br /><input type="submit" value="Delete" class="formbtn">
            </div>
            </form>
        </div>    
    </body>
</html>