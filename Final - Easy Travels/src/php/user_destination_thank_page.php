<?php require_once('user_navigation.php')?> 
<?php
	require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
    	$name=$_SESSION['name'];
	    $sql5="select packid from package where name='".$name."'";
	    $result5= mysqli_query($connection,$sql5);
	    while($row5=$result5->fetch_assoc()){
	        $packid=$row5['packid'];
	        //echo $packid;
	    }

     	$sql4="select max(resvid) from resavation";
        $result4=mysqli_query($connection,$sql4);
        $max=mysqli_fetch_assoc($result4);
        $maxid=$max['max(resvid)'];
        $_SESSION['nextid']=$maxid+1;
        
        
        $amount=$_SESSION['amount'];
        $date1=$_SESSION['date1'];
        $cname=$_SESSION['cname'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        
        
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
        
        
        $sql2="insert into payment(amount,date,name,email,telephone,address) 
        values('".$amount."','".$date1."','".$cname."','".$email."','".$phone."','".$address."')";
        $result2=mysqli_query($connection,$sql2);
        //echo $sql2;
?>
<?php include('../../public/html/user_thank_page.html')?>
<?php require_once('footer_user.php')?>