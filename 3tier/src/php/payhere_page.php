<?php require_once('connect.php');
    session_start();
?>
<?php require_once('user_navigation.php')?>

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
	
<?php include('../../public/html/payhere_page.html')?>
<?php require_once('footer.php')?>
