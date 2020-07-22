<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(photo) from category";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo)'];
    $nextphoto=$maxid+1;
?>
<html>
    <head>
        <title>EasyTravels.com</title>    
        <meata name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS TO CSS AND JS --->
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
        <link rel="stylesheet" type="text/css" href="../css/popup.css">

    <body>
    <button onclick="document.getElementById('id01').style.display='block'" class="catbtn">View Categories</button>
    <div class="container">
        <form method="post" action="admin_updatecategory_page.php" enctype="multipart/form-data">
            <label style="font-size:30px" align="center">Update Category</label><br />
            <label style="font-size:20px" align="center">First Select The Category</label>
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
                <label for="fname">New Category Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="New Category name.." required>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo</label>
            </div>
            <div class="col-75">
                <input type="file" name="image" required>
            </div>
            </div>
            <div class="row">
                <br /><input type="submit" name="formsubmit" value="Update" class="formbtn">        
            </div>
        </form>
    
    </div>

    <?php
        if(isset($_POST['formsubmit'])){
            $catname=$_POST['name'];
            //$file=$_POST['image'];
            //echo $file;
            $cat=$_POST['cat'];
			$filename=$nextphoto;

            $sql2 = "UPDATE category SET name ='".$catname."', photo ='".$filename."' where name='".$cat."'";   
            $result2 = mysqli_query($connection,$sql2);
            if($result2){
                echo "<script> alert('Category Sucessfully Added') </script>";
            }else{
                echo "failed";   
            }           
        }        
    ?>
	
	<?php

	if(isset($_FILES['image'])){
		$targetdir = '../images/category/';   
		$name=$nextphoto;
		$ext=".jpg";
		$targetfile = $targetdir.$name.$ext;
		$file_tmp =$_FILES['image']['tmp_name'];
         move_uploaded_file($file_tmp,$targetfile);
	}
	?>
	
	
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
        
            <div class="container1">
                
                <label style="font-size:30px; color:white;" align="center">View Categories</label>
                
                <div>
                <?php
                    $path='../images/category/';
                    $ex='.jpg';
                    
                    $sql1="select * from category";
                    $result2=$connection->query($sql1);
                    while($row=$result2->fetch_assoc()){
                        $name=(string)$row['name'];
                        $photo1=(string)$row['photo'];  

                        echo"
                        <form class='table' align='center'>
                        <div class='column'>
                            <div class='content'>
                                <h3>$name</h3>
                                <img src='".$path.$photo1.$ex."' class='pack-img'>
                            </div>
                        </div>   
                        </form>
                    ";
                    }
                ?>	
                </div>
            </div>                   
        </div>
    

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

    </body>
</html>

