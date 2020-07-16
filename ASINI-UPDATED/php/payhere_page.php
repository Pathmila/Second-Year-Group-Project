<?php require_once('connect.php');
    session_start();
    ?>
<?php require_once('user_navigation.php')?>
<?php 
    $travellers=$_GET['travellers'];
    $_SESSION['no']=$travellers;
    $price=$_SESSION['price'];
    $_SESSION['amount']=$_SESSION['no']*$_SESSION['price'];
    $_SESSION['order_id']=1;
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/form.css">
    </head>
    <body>
        <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
            <input type="hidden" name="merchant_id" value="1214795">    <!-- Replace your Merchant ID -->
            <input type="hidden" name="return_url" value="http://sample.com/return">
            <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
            <input type="hidden" name="notify_url" value="http://sample.com/notify">  
            <br><br><h1>Package Details</h1><br>
            <input type="hidden" name="order_id"  value="<?php echo $_SESSION['order_id']?>">
            Package Name: <input type="text" name="items"   value="<?php echo $_SESSION['name']?> "readonly><br />
            <input type="hidden" name="currency"  value="LKR">
            Total Amount(Rs): <input type="text" name="amount"  value="<?php echo $_SESSION['amount']?>"readonly>  
            <br><br><h1>Customer Details</h1><br>
            Name:<input type="text" name="first_name" placeholder="Enter Your Name.."><br />
            <input type="hidden" name="last_name" placeholder="Enter Your Last Name.." >
            Email:<input type="text" name="email" placeholder="Enter Your Email.." ><br />
            Telephone:<input type="text" name="phone" placeholder="Enter Your Telephone No.." ><br>
            Address:<input type="text" name="address" placeholder="Enter Your Address.." >
            <input type="hidden" name="city"  placeholder="Enter Your City..">
            <input type="hidden" name="country"  placeholder="Enter Your Country.."><br/>
            <input type="submit" value="Buy Now"><br/><br/><br />
        </form> 
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