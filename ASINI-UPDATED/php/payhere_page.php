<?php require_once('connect.php');
    session_start();
?>
<?php require_once('user_navigation.php')?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>
		<div class="container">
			<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
				<input type="hidden" name="merchant_id" value="1214795">    <!-- Replace your Merchant ID -->
				<input type="hidden" name="return_url" value="http://localhost/Second%20Year%20Project/php/user_thank_page.php">
				<input type="hidden" name="cancel_url" value="http://localhost/Second%20Year%20Project/php/user_home_page.php">
				<input type="hidden" name="notify_url" value="http://localhost/Second%20Year%20Project/php/user_home_page.php"> 
				
				<div class="row"><br><br><h1>Package Details</h1><br></div>
				
				<input type="hidden" name="order_id"  value="<?php ?>">
				
				<div class="row"><div class="col-25">Package Name: </div><div class="col-75"><input type="text" name="items"   value="<?php echo $_SESSION['name']?> "readonly><br /></div></div>
				
				<input type="hidden" name="currency"  value="LKR">
				
				<div class="row"><div class="col-25">Total Amount(Rs): </div><div class="col-75"><input type="text" name="amount"  value="<?php echo $_SESSION['amount']?>"readonly></div></div>

				
				
				<input type="hidden" name="first_name" placeholder="Enter Your Name..">
				
				<input type="hidden" name="last_name" placeholder="Enter Your Last Name.." >
				
				<input type="hidden" name="email" placeholder="Enter Your Email.." >
				
				<input type="hidden" name="phone" placeholder="Enter Your Telephone No.." >
				
				<input type="hidden" name="address" placeholder="Enter Your Address.." >
				
				<input type="hidden" name="city"  placeholder="Enter Your City..">
				<input type="hidden" name="country"  placeholder="Enter Your Country.."><br/>
				
				<div class="row"><input type="submit" value="Buy Now" class="formbtn"></div>
			</form> 
		</div>
    </body>


    <?php
        if(isset($_POST["submit"])){
            $merchant_id        = $_POST['merchant_id'];
            $order_id           = $_POST['order_id'];
            $payhere_amount     = $_POST['payhere_amount'];
            $payhere_currency   = $_POST['payhere_currency'];
            $status_code        = $_POST['status_code'];
            $md5sig             = $_POST['md5sig'];
            $status_message     = $_POST['status_message'];
            $customer_token     = $_POST['customer_token'];

            $merchant_secret = '4eVKAZlNIR98LM2UEMCiGH8W18isG7nZR8X6Qx6YZZ6h'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

            $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

            if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
                    //TODO: Store the encrypted token ($customer_token) securely in your database against your customer
            }
        }
    ?>
	
</html>
<?php require_once('footer.php')?>
