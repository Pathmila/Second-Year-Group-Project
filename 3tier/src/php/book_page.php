<?php require_once('../../config/connect.php');
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

<?php include('../../public/html/book_page.html')?>
<?php require_once('footer.php')?>