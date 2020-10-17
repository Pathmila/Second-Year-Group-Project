<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
    
    $sql4="select max(photo) from destination";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo)'];
    $nextid=$maxid+1;
?>

<?php
        if(isset($_POST['submit'])){
			$targetdir = '../images/destination/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			//echo "Asini";
            $dname=$_POST['name'];
            //$file=$_POST['image'];
            //echo $file;
            //$cat=$_POST['cat'];
			$destination=$_POST['subject'];
			$filename=$nextid;

            $sql2="INSERT INTO destination(name,description,photo) values ('".$dname."','".$destination."','".$filename."')"; 
			echo $sql2;
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
	

<html>
    <head>
        <title>EasyTravels.com</title>    
        <meata name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS TO CSS AND JS --->
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
	
	
    <body>
        <div class="container">
        <form method='POST' action="admin_adddestination_page.php" enctype="multipart/form-data">
			<h2 class="title"><label>Add Destination</label></h2>
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" id="name"  placeholder="Destination name.." required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Details</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
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