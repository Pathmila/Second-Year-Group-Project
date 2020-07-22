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
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body> 
        <div class="container">
        <form method="GET" action="admin_addcategory_page.php">
            <label style="font-size:30px" align="center">Add Category</label>
            <div class="row">
            <div class="col-25">
                <label for="fname">Category id</label>
            </div>
            <div class="col-75">
                <input type="text" id="id" name="id" value=<?php echo $nextid ?>  readonly>
            </div>
            </div>

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
                <br /><input type="submit" value="Submit" class="formbtn">
            </div>
        </form>
        </div>
    </body>
</html>

<?php
    $targetdir = '../images/category/';   
    $name=$nextid;
	$ext=".jpg";
    $targetfile = $targetdir.$name.$ext;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
    
        //echo "Done";
    } else { 
        //echo "Not uploaded";
    
  	}


	if(isset($_GET['submit'])){

    $photo=(String)$_FILES['file1'];    
	$sql = "INSERT INTO category(catid,name,photo) values ('".$_GET['id']."','".$_GET['name']."','".$photo."')";
	
    $result=$connection->query($sql);
    
    
  
	
	if($result){
	echo "<script> alert('Category Sucessfully Added') </script>";
	
	//header("Location: viewSupplier.php");
	die();
	}
	else{
	echo "failed";
	die();}

    }
?>

