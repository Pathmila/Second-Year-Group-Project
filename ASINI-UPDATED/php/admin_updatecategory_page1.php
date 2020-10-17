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

<?php
	if(isset($_POST['submit'])){
		$_SESSION['category']=$_POST['cat'];
		header("Location: admin_updatecategory_page2.php");
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
        <form method="post" action="admin_updatecategory_page1.php" enctype="multipart/form-data">
            <h2 align="center" class="title"><label>Update Category</label></h2>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select the category name</label>
            </div>
            <div class="col-50">
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
            <div class="col-25">
				&nbsp
                <input type="submit" name="submit" value="Go" class="formbtn">        
            </div>
			</div>
        </form>
    
    </div>
    </body>
</html>
<?php require_once('footer.php')?>
