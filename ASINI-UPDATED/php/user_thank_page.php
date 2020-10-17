<?php require_once('user_navigation.php')?> 
<?php
	require_once('connect.php');
    session_start();
	$sql4="select max(resvid) from payment";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(resvid)'];
    $nextid=$maxid+1;
	
	$name=$_SESSION['name'];
	$amount=$_SESSION['amount'];
	$date1=$_SESSION['date1'];
	$cname=$_SESSION['cname'];
	$email=$_SESSION['email'];
	$phone=$_SESSION['phone'];
	$address=$_SESSION['address'];
	
	
	$packid=$_SESSION['packid'];
	$uid=$_SESSION['uid'];
	$date=$_SESSION['date'];
	$no=$_SESSION['no'];
	$sroom=$_SESSION['single'];
	$droom=$_SESSION['double'];
	$froom=$_SESSION['family'];
	
		
		$sql="insert into resavation(packid,uid,date,travelers,singlerooms,doublerooms,familyrooms) 
		values('".$packid."','".$uid."','".$date."','".$no."','".$sroom."','".$droom."','".$froom."')";
		$result=mysqli_query($connection,$sql);
		//echo $sql;
		
		$sql3="select max(resvid) from resavation";
		$result3=mysqli_query($connection,$sql3);
		$maxr=mysqli_fetch_assoc($result3);
		$maxrid=$maxr['max(resvid)'];
		//echo $maxrid;
		
		
		$sql2="insert into payment(resvid,amount,date,name,email,telephone,address) 
		values('".$maxrid."','".$amount."','".$date1."','".$cname."','".$email."','".$phone."','".$address."')";
		$result2=mysqli_query($connection,$sql2);
		//echo $sql2;
	
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
        
			<h2 align="center" style="font-size:50px;"><label>Thank You!</label></h2>
            
            <h2 align="center" class="title"><label>Your Order Id: &nbsp <?php echo $nextid ?></label></h2>
            
			<div class="row">
				<a href="user_home_page.php"><input type="button" value="Go To Home" class="formbtn"></a>
			</div>
            
       
        </div>
    </body>
</html>
<?php require_once('footer.php')?>