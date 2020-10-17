
<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
    
    $sql4="select max(catid) from category";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(catid)'];
    $nextid=$maxid+1;
?>
<?php
        if(isset($_POST['submit'])){
			$targetdir = '../images/category/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			//echo "Asini";
            $catname=$_POST['name'];
            //$file=$_POST['image'];
            //echo $file;
            //$cat=$_POST['cat'];

			$filename=$nextid;

            $sql2="INSERT INTO category(name,photo) values ('".$catname."','".$filename."')"; 
			//echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
				echo "<script> alert('Insert is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
            }else{
				//echo "failed";
				header("Location: admin_home_page.php");
            }  
        }        
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body> 
        <div class="container">
        <form method="post" action="admin_addcategory_page.php" enctype="multipart/form-data">
            <h2 class="title"><label>Add Category</label></h2>

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
                <br /><input type="file" name="image" id="image" required>
            </div>
            </div>
            
            <div class="row">
                <input type="submit" name="submit" value="Submit" class="formbtn">
            </div>
        </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>



