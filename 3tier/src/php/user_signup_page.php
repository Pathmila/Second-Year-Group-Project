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
		
    if(isset($_GET['formsubmit'])){
		$name=$_GET['name'];
		$email=$_GET['email'];
		$address=$_GET['address'];
		$telephone=$_GET['telephone'];
		$username=$_GET['uname'];
		$password=$_GET['cpassword'];
		//echo $username;
				
				
			$_SESSION['username']=$username;
			$_SESSION['pwd']=$password;
				
			//insert in to user table
			$insertuser = "INSERT INTO user(name,address,email,telephone) values ('".$name."','".$address."','".$email."','".$telephone."')";
            $result2=$connection->query($insertuser);
			//echo $insertuser;
			if($result2){
				$_GLOBAL['userdone']=1;
			}else{
				$_GLOBAL['userdone']=0;
			} 
				
			$sql8="select max(uid) from user";
			$result8=mysqli_query($connection,$sql8);
			$max=mysqli_fetch_assoc($result8);
			$maxuid=$max['max(uid)'];
				
			//insert in to account table
			$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$maxuid."','".$username."','".$password."',0)";
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
		
    }        		
?>

<?php include('../../public/html/user_signup_page.html')?>
<?php require_once('footer.php')?>