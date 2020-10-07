<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
    require_once('vehicle_navigation.php')?> 
<!DOCTYPE html>
<html>
<head>
<head>
    <title>EasyTravels</title>
    <meta charset="utf-8">
    <meta name="viewport" content = "width=divice-width , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vehicle_home_style.css">
     <link rel ="shortcut icon" type="image/png" href="../image/Logo.png">
    
</head>
<body>
<div>
    <div  class="div_1">
        
        <img src="../images/home.png" class="welcome">
    </div>

</div>
</body>
</html>     
<?php require_once('footer.php')?>