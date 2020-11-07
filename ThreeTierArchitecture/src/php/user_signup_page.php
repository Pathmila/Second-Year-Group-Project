<?php require_once('user_nonnavigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(uid) from user";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(uid)'];
    $nextuid=$maxid+1;
?>

<?php
	$_GLOBAL['accountdone']=0;
	$_GLOBAL['userdone']=0;
	
		
    if(isset($_POST['formsubmit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$telephone=$_POST['telephone'];
		$uname=$_POST['uname'];
		$pass=$_POST['password'];
		$cpassword=(string)$_POST['cpassword'];
		//echo $username;
		
		$hash = md5($cpassword);
		
		$checked = checkusername($uname,$connection);
				
		if($checked==1){
			//echo 'done';
			//$_SESSION['username']=$username;
			//$_SESSION['pwd']=$cpassword;
				
			//insert in to user table
			$insertuser = "INSERT INTO user(name,address,email,telephone) values ('".$name."','".$address."','".$email."','".$telephone."')";
            $result2=$connection->query($insertuser);
			//echo $insertuser;
			if($result2){
				$_GLOBAL['userdone']=1;
			}else{
				$_GLOBAL['userdone']=0;
			} 
				
			//selecting the maximum uid from the user table	
			$sql8="select max(uid) from user";
			$result8=mysqli_query($connection,$sql8);
			$max=mysqli_fetch_assoc($result8);
			$maxuid=$max['max(uid)'];
				
			//insert in to account table
			$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$maxuid."','".$uname."','".$hash."',0)";
			//echo $insertaccount;
			$result=$connection->query($insertaccount);
			if($result){
				$_GLOBAL['accountdone']=1;
			}else{
				$_GLOBAL['accountdone']=0;
			}
            //print_r($result);
			
			if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['userdone']==1)){	
				//echo $_GLOBAL['accountdone'];
				//echo $_GLOBAL['userdone'];
                echo "<script> alert('Registration is Sucessfull') </script>";
				header("Location: login_page.php");
            }else{
                //echo "failed";
				echo "<script> alert('Registration is Failed') </script>";
				//header("Location: login_page.php");
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

<?php include('../../public/html/user_signup_page.html')?>
<?php require_once('footer.php')?>