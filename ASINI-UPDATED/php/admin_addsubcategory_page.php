<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
		if(isset($_POST['submit'])){	
			//echo "Asini";
            $subcatname=$_POST['name'];
			$description=$_POST['description'];
   

            $sql="INSERT INTO subcategory(name,description) values ('".$subcatname."','".$description."')"; 
			//echo $sql2;
			$result2 = mysqli_query($connection,$sql);
            if($result2){
				echo "<script> alert('Insert is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
            }else{
				//echo "failed";
				header("Location: admin_home_page.php");
            }  
        }        
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
        <form method='POST' action='admin_addsubcategory_page.php'>
            <label style="font-size:30px" align="center">Add Subcategory</label>

            <div class="row">
            <div class="col-25">
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" id="name" placeholder="Subcategory name.." required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Description</label>
            </div>
            <div class="col-75">
                <input type="text" name="description" id="description" placeholder="Description.." required>
            </div>
            </div>
            <div class="row">
                <br /><input type="submit" name="submit" value="Add" class="formbtn">
            </div>
        </form>
        </div>   
    </body>
</html>