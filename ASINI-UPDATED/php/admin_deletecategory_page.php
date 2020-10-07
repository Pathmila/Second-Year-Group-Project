<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>
<?php
    if(isset($_POST['submit'])){
		$category=$_POST['cat'];
		$sql="Delete from category where name='".$category."'"; 
		//echo $sql2;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Sucessfully Deleted') </script>";				
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
    </head>
    <body>
        <div class="container">
        <form method="post" action="admin_deletecategory_page.php">
            <label style="font-size:30px" align="center">Delete Category</label>
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
                <br /><input type="submit" name="submit" value="Delete" class="formbtn">
            </div>
        </form>
        </div>
    </body>
</html>