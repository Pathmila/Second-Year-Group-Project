<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$subcat=$_SESSION['subcategory'];
 ?>
 <?php
    if(isset($_POST['submit'])){
		$category=$_POST['subcat'];
		$sql="Delete from subcategory where name='".$category."'"; 
		//echo $sql;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert('Delete is failed') </script>";				
			//header("Location: admin_home_page.php");
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
        <form method="post" action="admin_deletesubcategory_page.php">
            <label style="font-size:30px" align="center">Delete Subcategory</label>
          

            <div class="row">
            <div class="col-25">
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-50">
                <input type="text" name="subcat" value="<?php echo $subcat?>" readonly>
            </div>
            <div class="col-25">
                <input type="submit" name="submit" value="Delete" class="formbtn">
            </div>
			</div>
            </form>
        </div>    
    </body>
</html>
<?php require_once('footer.php')?>