<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
 ?>
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
                <select name="package" id="package">
                    <?php
						$sql3="select * from package";
						$result2=$connection->query($sql3);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
                    ?>
                </select>
            </div>
            </div>
			
            <div class="row">
                <br /><input type="submit" value="Delete" class="formbtn">
            </div>
            </form>
        </div>    
    </body>
</html>