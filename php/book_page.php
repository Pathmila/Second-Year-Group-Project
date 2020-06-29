<?php require_once('connect.php');
    session_start();
    ?>
<?php require_once('user_navigation.php')?> 

<?php 
    $name=$_GET['name'];
    $_SESSION['name']=$name;
    $price=$_GET['price'];
    $_SESSION['price']=$price;
    //echo $_SESSION['price'];
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
        <form method="GET" action="payhere_page.php">
            <label style="font-size:30px" align="center">Booking Details</label>
            <div class="row">
            <div class="col-25">
                <label for="fname">Package Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" disabled>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Price For A Person(Rs.):</label>
            </div>
            <div class="col-75">
                <input type="text" name="price" value=<?php echo $price?> disabled>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select The Date:</label>
            </div>
            <div class="col-75">
                <input type="date" name="date" >
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Travellers:</label>
            </div>
            <div class="col-75">
                <input type="number" name="travellers" min="1" max="100" step="1">
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Single Rooms:</label>
            </div>
            <div class="col-75">
                <input type="number" name="single" min="1" max="10" step="1">
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Double Rooms:</label>
            </div>
            <div class="col-75">
                <input type="number" name="double" min="1" max="10" step="1">
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Family Rooms:</label>
            </div>
            <div class="col-75">
                <input type="number" name="family" min="1" max="10" step="1">
            </div>
            </div>
            <div class="row">
				<input type="submit" name="submit" value="View Amount"><br />
            </div>
        </form>
        </div>
    </body>
</html>
