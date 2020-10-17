<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>

<?php 
    require_once('connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$_SESSION['subcategory']=$_POST['subcat'];
		header("Location: admin_updatesubcategory_page2.php");
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
        <form method="post" action="admin_updatesubcategory_page1.php" enctype="multipart/form-data">
        <div class="container">
			<h2 align="center" class="title"><label>Update Subcategory</label></h2>

            <div class="row">
            <div class="col-25">
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-50">
                <select name="subcat" id="subcat">
                    <?php
                    $sql3="select * from subcategory";
                    $result2=$connection->query($sql3);
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