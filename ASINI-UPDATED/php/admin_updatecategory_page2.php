<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('connect.php');
    session_start();
	$path='../images/category/';
	$ex='.jpg';
	$category=$_SESSION['category'];
	//echo $category;
	$_SESSION['category']=$category;
	$sql = "SELECT * from category where name='".$category."'"; 
	$result=mysqli_query($connection,$sql);	
    while($row=$result->fetch_assoc()){
        $photo=(string)$row['photo'];
		$catid=(string)$row['catid'];
		//echo $catid;
    }
?>

    <?php
        if(isset($_POST['formsubmit'])){
			$targetdir = '../images/category/';   
			$name=$catid;
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
			$_SESSION['category']=$catname;
			$cate=$_SESSION['category'];
			$filename=$catid;

            $sql2 = "UPDATE category SET name ='".$catname."', photo ='".$filename."' where name='".$cate."'";  
			//echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
				echo "<script> alert('Update is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
            }else{
				echo "<script> alert('Update is Failed') </script>";				
				//echo "failed";
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
        

    <body>
    
		<div class="container">
			<form method="post" action="admin_deletecategory_page" enctype="multipart/form-data">
				<h2 class="title"><label><?php echo $category;?>&nbsp&nbsp-&nbsp&nbsp Update Category</label></h2>
	   
				<div class="row">
				<div class="col-25">
					<label for="fname">Category Name</label>
				</div>
				<div class="col-75">
					<input type="text" id="catname" name="catname" value="<?php echo $category;?>"  readonly>
				</div>
				</div>  
				<div class="row">
				<div class="col-25">
					<label for="fname">Photo</label>
				</div>
				<div class="col-75">
					<?php echo "<img class='image' width='150px' src='".$path.$photo.$ex."'>";?>
				</div>
				</div> 
				<div class="row">
					<input type="submit" name="formdelete" class="formbtn" value="Delete">
				</div> 
			</form>
		</div>
		
		<div class="container">
        <form method="post" action="admin_updatecategory_page2.php" enctype="multipart/form-data">
			<div class="row">
				<h2 class="title"><label>Enter New Details To Update</label></h2>
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
                <label for="lname">New photo</label>
            </div>
            <div class="col-75">
				<br />
                <input type="file" name="image" required>
            </div>
            </div>
            <div class="row">
				<input type="submit" name="formsubmit" value="Update" class="formbtn">  
            </div>
        </form>
    </div>
</html>
<?php require_once('footer.php')?>
