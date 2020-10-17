<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/report.css">
    </head>
    <body> 
		<div class="login">
            <div class="login-form">
                <form>               
                    <p class="para">Select Your Report Type</p>
					<img src="../images/reports2.jpg" width="300px"><br />
                    <br />
                    <a href="admin_view_report_general.php"><input type="button" value="General Reports" class="packbtn"></a>
                    <br />
                    <a href="admin_view_report_financial.php"><input type="button" value="Financial Reports" class="packbtn"></a>
                    <br />
                </form>
            </div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>


