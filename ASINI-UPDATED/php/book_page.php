<?php require_once('connect.php');
    session_start();
	
?>
<?php require_once('user_navigation.php')?> 

<?php 
    $name=$_SESSION['name'];
    $price=$_SESSION['price'];
	$date1=date("d/m/Y");
	$_SESSION['date1']=$date1;
	//echo $_SESSION['date1'];
?>
<?php
	if(isset($_GET['submit'])){
		$no=$_GET['no'];
		$_SESSION['no']=$no;
		//echo $_SESSION['no'];
		$amount=$price*$no;
		//echo $amount;
		$_SESSION['amount']=$amount;
		$_SESSION['date']=$_GET['date'];
		$_SESSION['cname']=$_GET['cname'];
		$_SESSION['email']=$_GET['email'];
		$_SESSION['phone']=$_GET['phone'];
		$_SESSION['address']=$_GET['address'];
		
		$_SESSION['single']=$_GET['single'];
		$_SESSION['double']=$_GET['double'];
		$_SESSION['family']=$_GET['family'];
		
		
		
		header("Location: payhere_page.php");
		
		
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
        <form method="GET" action="book_page.php">
			<h2 class="title"><label>Booking Details</label></h2>
            <div class="row">
            <div class="col-25">
                <label for="fname">Package Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="pname" value="<?php echo $name?>" readonly>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Price For A Person(Rs.):</label>
            </div>
            <div class="col-75">
                <input type="text" name="price" value=<?php echo $price?> readonly>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select The Date:</label>
            </div>
            <div class="col-75">
                <input type="date" name="date" required>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Travellers:</label>
            </div>
            <div class="col-75">
                <input type="number" name="no" min="1" max="100" step="1" required>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Single Rooms:</label>
            </div>
            <div class="col-75">
                <input type="number" name="single" min="0" max="10" step="1" required>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Double Rooms:</label>
            </div>
            <div class="col-75">
                <input type="number" name="double" min="0" max="10" step="1" required>
            </div>
            </div>
            <div class="row">
            <div class="col-25">
                <label for="fname">Select No Of Family Rooms:</label>
            </div>
            <div class="col-75">
                <input type="number" name="family" min="0" max="10" step="1" required>
            </div>
            </div>
			
			
			<div class="row">
                <h1>Customer Details</h1>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="cname" placeholder="Enter Your Name.." required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" placeholder="Enter Your Email.." required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Telephone:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="phone" placeholder="Enter Your Telephone No.." required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" placeholder="Enter Your Address.." required>
            </div>
            </div>
			
            <div class="row">
				<input type="submit" name="submit" value="View Amount" class="formbtn">
            </div>
        </form>
        </div>
    </body>
	
</html>
<?php require_once('footer.php')?>