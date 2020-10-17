<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$cat=$_SESSION['category'];
?>
<?php
    if(isset($_POST['submit'])){
		$category=$_POST['cat'];
		$sql="Delete from category where name='".$category."'"; 
		//echo $sql;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert(Delete) </script>";				
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
        <form method="post" action="admin_deletecategory_page.php">
			<h2 align="center" class="title"><label>Delete Category&nbsp&nbsp-&nbsp&nbsp<?php echo $cat?></label></h2>
            <div class="row">
            <div class="col-25">
                <label for="fname">Category Name</label>
            </div>
            <div class="col-50">
                <input type="text" name="cat" value="<?php echo $cat?>" readonly>
            </div>
			<div class="col-25">
				&nbsp
				<input type="submit" name="submit" value="Delete" class="formbtn">
            </div>
			</div>
        </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>