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
                    <p class="para">Select Your Report</p>
					<img src="../images/report1.png" width="250px"><br />
                    <br />
                    <a href="admin_view_report_general1.php"><input type="button" value="No of Account Holders" class="packbtn"></a>
                    <br />
                    <a href="admin_view_report_general2.php"><input type="button" value="Packages & Destination" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_general3.php"><input type="button" value="Most Popular Packages" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_general4.php"><input type="button" value="User Comments" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_general5.php"><input type="button" value="User Messages" class="packbtn"></a>
                    <br />
                </form>
            </div>
        </div>
	</body>
</html>
<?php require_once('footer.php')?>