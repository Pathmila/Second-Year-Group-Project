
<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$type=$_POST['type'];
		$_SESSION['type']=$_POST['type'];
		if( $type == "user"){
			header("Location: admin_viewaccount1.php");
		}
		if( $type == "hotel"){
			header("Location: admin_viewaccount2.php");
		}
		if( $type == "vehicle"){
			header("Location: admin_viewaccount3.php");
		}
		if( $type == "guide"){
			header("Location: admin_viewaccount4.php");
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body> 
        <div class="container">
        <form method="post" action="admin_viewaccount.php">
			<h2 align="center" class="title"><label>View Accounts</label></h2>

            <div class="row">
            <div class="col-25">
                <label for="fname">Select The Account Type</label>
            </div>
            <div class="col-50">
                <select name="type" id="type">
					<option>user</option>
					<option>hotel</option>
					<option>vehicle</option>
					<option>guide</option>
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


