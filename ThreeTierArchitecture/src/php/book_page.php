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
	$datelike=date("d/m/Y");
	//echo $day;
	$array = explode("/",$datelike);
	$year= $array[2];
	$month= $array[1];
	$day= $array[0];
	
	$today=(String)($month.'/'.$day.'/'.$year);
	//echo $today;
?>
<?php
	if(isset($_GET['submit'])){
		$no=$_GET['no'];
		$_SESSION['no']=$no;
		//echo $_SESSION['no'];
		$amount=$price*$no;
		//echo $amount;
		
		$selectday=$_GET['date'];
		//echo $selectday;
		$single=$_GET['single'];
		$double=$_GET['double'];
		$family=$_GET['family'];
		$cname=$_GET['cname'];
		$email=$_GET['email'];
		$phone=$_GET['phone'];
		$address=$_GET['address'];
		
		$checkDateOf= checkDateOf($today,$selectday);
		$checkRooms= checkRooms($no,$single,$double,$family);
		
		if($checkDateOf==0){
			$selectday="";
		}

		if($checkRooms==0){
			$single="";
			$double="";
			$family="";	
		}
				
		if(($checkDateOf==1) && ($checkRooms==1)){	
			//echo "asini";
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
	}
?>

<?php
	function checkDateOf($today,$selectday){
		$td=$today;
		$array1 = explode("/",$td);
		$year1= $array1[2];
		$month1= $array1[0];
		$day1= $array1[1];
		
		$sd=$selectday;
		$array2 = explode("-",$sd);
		$year2= $array2[0];
		$month2= $array2[1];
		$day2= $array2[2];
			
		if((($year1<=$year2) && ($month1<$month2)) || (($month1==$month2) && ($day1<$day2))){
			return 1;
		}else{
			echo "<script> alert('Invalid Date..') </script>";
			return 0;
		}
	}
?>

<?php
	function checkRooms($no,$single,$double,$family){		
		$sr=($single+($double*2)+($family*5));
		//echo $sr;
		if($no<=$sr){
			return 1;
		}else{
			echo "<script> alert('Invalid Number of Rooms..') </script>";
			return 0;			
		}
	}
?>

<?php include('../../public/html/book_page.html')?>
<?php require_once('footer.php')?>