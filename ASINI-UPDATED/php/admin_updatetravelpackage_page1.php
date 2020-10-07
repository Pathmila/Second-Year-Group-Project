<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>

<?php 
    require_once('connect.php');
    session_start();
?>

<?php
	if(isset($_POST['btnsubmit'])){
		//echo asini;
		$_SESSION['package']=$_POST['package'];
		header("Location: admin_updatetravelpackage_page.php");
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
        <form method="post" action="admin_updatetravelpackage_page1.php" >
        <div class="container">
            <label style="font-size:30px" align="center">Update Travel Package</label>

            <div class="row">
            <div class="col-25">
                <label for="fname">Package Name</label>
            </div>
            <div class="col-75">
                <select name="package" id="package">
                    <?php
                    $sql3="select * from package";
                    $result2=$connection->query($sql3);
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                    }
                    ?>
                </select>
            </div>
            </div>

            <div class="row">
                <input type="submit" name="btnsubmit" value="Go" class="formbtn">        
            </div>

            </form>
        </div>    
    </body>
</html>