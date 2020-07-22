<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php') ?>
<html>
    <head>
        <title>EasyTravels.com</title>    
        <meata name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS TO CSS AND JS --->
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <div class="container">
        <form>
            <label style="font-size:30px" align="center">Add Travel Package</label>
            <div class="row">
            <div class="col-25">
                <label for="fname">Category Name</label>
            </div>
            <div class="col-75">
                <select name="cat" id="cat">
                    <?php
                        $sql2="select * from category";
                        $result2=$connection->query($sql2);
                        while($row=$result2->fetch_assoc()){
                            echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                        }
                    ?>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-75">
                <select name="subcat" id="subcat">
                    <?php
                    $sql3="select * from subcategory";
                    $result2=$connection->query($sql3);
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                    }
                    ?>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Package Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" id="name" required>
            </div>
            </div>
   
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 1</label>
            </div>
            <div class="col-75">
            <select name="destination" id="destination">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>   

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 2</label>
            </div>
            <div class="col-75">
            <select name="destination" id="destination">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div> 
 
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 3</label>
            </div>
            <div class="col-75">
            <select name="destination" id="destination">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>
            
            
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 4</label>
            </div>
            <div class="col-75">
            <select name="destination" id="destination">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>
            
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 5</label>
            </div>
            <div class="col-75">
            <select name="destination" id="destination">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">No of Days</label>
            </div>
            <div class="col-75">
                <input type="number" name="number" id="number" min="1" max="50" required>
            </div>
            </div>
                    
            <div class="row">
            <div class="col-25">
                <label for="fname">Package Price</label>
            </div>
            <div class="col-75">
                <input type="text" name="price" id="price" required>
            </div>
            </div>    
  
            <div class="row">
            <div class="col-25">
                <label for="fname">Details</label>
            </div>
            <div class="col-75">
                <textarea id="details" name="details" placeholder="Write the details.." style="height:200px"></textarea>
            </div>
            </div> 

            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo 1</label>
            </div>
            <div class="col-75">
                <input type="file" name="file1" id="file1" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo 2</label>
            </div>
            <div class="col-75">
                <input type="file" name="file2" id="file2" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo 3</label>
            </div>
            <div class="col-75">
                <input type="file" name="file3" id="file3" required>
            </div>
            </div>

            <div class="row">
                <br /><input type="submit" value="Submit" class="formbtn">
            </div>
        </form>
        </div>

    </body>
</html>