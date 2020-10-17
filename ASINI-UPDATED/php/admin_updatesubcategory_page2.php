<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('connect.php');
    session_start();
?>
<?php
	$path='../images/category/';
	$ex='.jpg';
	$subcategory=$_SESSION['subcategory'];
	//echo $category;
	//$_SESSION['category']=$category;
	$sql = "SELECT * from subcategory where name='".$subcategory."'"; 
	$result=mysqli_query($connection,$sql);	
    while($row=$result->fetch_assoc()){
		$description=(string)$row['description'];
    }
	
?>

<?php
        if(isset($_POST['formsubmit'])){
			
            $subcatname=$_POST['name'];
			$ndetails=$_POST['ndetails'];
			$_SESSION['subcatname']=$subcatname;


            $sql2 = "UPDATE subcategory SET name ='".$subcatname."', description ='".$ndetails."' where name='".$subcatname."'";  
			echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
				echo "<script> alert('Update is Sucessfull') </script>";				
				//header("Location: admin_home_page.php");
            }else{
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
        <form method="post" action="admin_deletesubcategory_page.php">
			<h2 class="title"><label><?php echo $subcategory;?>&nbsp&nbsp-&nbsp&nbsp Update Subcategory</label></h2>
             
            <div class="row">
            <div class="col-25">
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="subcatname" name="subcatname" value="<?php echo $subcategory;?>"  readonly>
            </div>
            </div>  
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Description</label>
            </div>
            <div class="col-75">
				<input type="text" id="details" name="details" value="<?php echo $description; ?>"  readonly>
            </div>
            </div> 
			<div class="row">
				<br />
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
                <label for="fname">New Subcategory Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="New Subcategory name.." required>
            </div>
            </div>
            
			<div class="row">
            <div class="col-25">
                <label for="fname">New Description</label>
            </div>
            <div class="col-75">
				<input type="text" id="ndetails" name="ndetails" placeholder="New Subcategory description.." required>
            </div>
            </div> 
			<br />
			
            <div class="row">
                <input type="submit" name="formsubmit" value="Update" class="formbtn">        
            </div>
        </form>
    </div>
</html>
<?php require_once('footer.php')?>
