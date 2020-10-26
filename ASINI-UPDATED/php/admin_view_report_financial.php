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
					<img src="../images/report3.png" width="300px"><br />
                    <br />
                    <a href="admin_view_report_financial1.php"><input type="button" value="Total Revenue By Month" class="packbtn"></a>
                    <br />
                    <a href="admin_view_report_financial2.php"><input type="button" value="Total Revenue By Date" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_financial7.php"><input type="button" value="Highest Revenue Month" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_financial3.php"><input type="button" value="Most Valuable Users" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_financial4.php"><input type="button" value="Best Guides" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_financial5.php"><input type="button" value="Best Hotels" class="packbtn"></a>
                    <br />
					<a href="admin_view_report_financial6.php"><input type="button" value="Best Vehicles" class="packbtn"></a>
                    <br />
                </form>
            </div>
        </div>
	</body>
</html>
<?php require_once('footer.php')?>