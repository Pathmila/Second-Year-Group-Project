<?php require_once('hotel_navigation.php')?> 
<?php require_once('menu.php')?> 

<!DOCTYPE html>
<html>
<head>
<head>
    <title>EasyTravels</title>
    <meta charset="utf-8">
    <meta name="viewport" content = "width=divice-width , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/hotel_home.css">   
</head>
<body>
<div>
    <div  class="div_1">
        <img src="../images/WELCOME.png" class="welcome">
        <img src="<?php if (isset($userProfile)) echo $userProfile; ?>" alt="image" class="img img-rounded" width="200" >
    </div>

</div>
</body>
</html>     
<?php require_once('footer.php')?>