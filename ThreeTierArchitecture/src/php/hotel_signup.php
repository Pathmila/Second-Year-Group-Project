<?php require_once('user_nonnavigation.php')?>
<?php 
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(hid) from hotel";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(hid)'];
    $nexthid=$maxid+1;
?>

<?php

        if(isset($_POST['formsubmit'])){
			
			$targetdir = '../../public/images/hotel/';   
			$name=$nexthid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}

			$_GLOBAL['accountdone']=0;
			$_GLOBAL['hoteldone']=0;
			$_GLOBAL['hotelavailabilitydone']=0;


				$filename=$nexthid;
				$name=$_POST['name'];
				$email=$_POST['email'];
				$address=$_POST['address'];
				$telephone=$_POST['telephone'];
				$uname=$_POST['uname'];
				$photo=$nexthid;
				$description=$_POST['description'];
				$pass=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				$singlerooms=$_POST['srooms'];
				$singleroomprice=$_POST['sprice'];
				$doublerooms=$_POST['drooms'];
				$doubleroomprice=$_POST['dprice'];
				$familyrooms=$_POST['frooms'];
				$familyroomprice=$_POST['fprice'];


				$hash = md5($cpassword);
				
				$checked = checkusername($uname,$connection);
				
				if($checked==1){
				
					//print_r($result);
					
					//insert in to hotel table
					$inserthotel = "INSERT INTO hotel(name,address,email,telephone,description,photo,singlerooms,singleroomprice,doublerooms,doubleroomprice,familyrooms,familyroomprice) values ('".$name."','".$address."','".$email."','".$telephone."','".$description."','".$filename."','".$singlerooms."','".$singleroomprice."','".$doublerooms."','".$doubleroomprice."','".$familyrooms."','".$familyroomprice."')";
					$result1=$connection->query($inserthotel);
					//echo $inserthotel;
					if($result1){
						$_GLOBAL['hoteldone']=1;
					}else{
						$_GLOBAL['hoteldone']=0;
					}

					$sql8="select max(hid) from hotel";
					$result8=mysqli_query($connection,$sql8);
					$max=mysqli_fetch_assoc($result8);
					$maxhid=$max['max(hid)'];
					//echo $maxhid;

					//insert in to account table
					$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$maxhid."','".$uname."','".$hash."',3)";
					$result=$connection->query($insertaccount);
					if($result){
						$_GLOBAL['accountdone']=1;
						
					}else{
						$_GLOBAL['accountdone']=0;
					}

					
					if( ($_GLOBAL['accountdone']==1) && ($_GLOBAL['hoteldone']==1) ){
						//echo $_GLOBAL['accountdone'];
						//echo $_GLOBAL['hoteldone'];
						//echo $_GLOBAL['hotelavailabilitydone'];
						echo "<script> alert('Registration is Sucessfull') </script>";
						header("Location: login_page.php");
					}else{
						echo "<script> alert('Registration is Failled') </script>";
					}
				}else{
					//echo 'failed';
					//header("Location: account_page.php");
					$uname="";
					echo "<script> alert('User name already used..') </script>";
				}
        }            
		
    ?>
<?php
	function checkusername($uname,$connection){
		$sql10="select * from account where username='".$uname."'";
		//echo $sql10;
		$result10=mysqli_query($connection,$sql10);
		if($row10=$result10->fetch_assoc()){
			return 0;
		}else{
			return 1;
		} 
	}
?>

<?php include('../../public/html/hotel_signup.html')?>
<?php require_once('footer.php')?>
