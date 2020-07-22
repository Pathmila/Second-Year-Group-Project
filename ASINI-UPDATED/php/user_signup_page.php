<?php require_once('user_nonnavigation.php')?> 
<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(uid) from user";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(uid)'];
    $nextuid=$maxid+1;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user_signup_page.css">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <form method="get" action="user_signup_page.php">               
                    <p class="para"> User Signup</p>
                    <div class='row'>
						<div class='col-50'>
                            <h3>User ID:</h3>
                            <input name="uid" id="uid" type="text" value=<?php echo $nextuid ;?>  readonly>
						</div>
						<div class='col-50'>
                            <h3>Name:</h3>
                            <input name="name" id="name" placeholder="Name" type="text" required >
						</div>
                    </div>
                    <div class='row'>
						<div class='col-50'>
							<h3>Userame:</h3>
                            <input name="uname" id="uname" placeholder="Username" type="text" required >
						</div>
						<div class='col-50'>
                            <h3>Address:</h3>
                            <input name="address" id="address" placeholder="Address" type="text" required >
                        </div>
                    </div>
                    <div class='row'>
						<div class='col-50'>
							<h3>Email:</h3>	
                            <input name="email" id="email" placeholder="Email" type="email" required >
						</div>
						<div class='col-50'>
							<h3>Telephone No:</h3>
                            <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required >
                        </div>
					</div>
					<div class='row'>
						<div class='col-50'>
							<h3>Password:</h3>
                            <input type="password" name="password" placeholder="Password" required>
						</div>
						<div class='col-50'>
							<h3>Confirm the Password:</h3>
                            <input type="password" name="cpassword" placeholder="Confirm Password" required>
                        </div>
					</div>
                    <div class='row'>
                        <input type="checkbox" id="check" name="check" required>
                        <label for="check" ><a href="#" class="sign-up">I Agree To The Terms And Conditions</a></label><br>
                    </div>
                    <div class='row'>
                        <input type="submit" name="formsubmit" value="SIGN IN" class="packbtn">
                    </div>
                </form>
            </div>
        </div>
    </body>
	
	<?php
		$_GLOBAL['accountdone']=0;
		$_GLOBAL['userdone']=0;

        if(isset($_GET['formsubmit'])){
				$uid=$_GET['uid'];
				$name=$_GET['name'];
				$email=$_GET['email'];
				$address=$_GET['address'];
				$telephone=$_GET['telephone'];
				$username=$_GET['uname'];
				$password=$_GET['cpassword'];
				
				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$uid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
                //print_r($result);
				
				//insert in to user table
				$insertuser = "INSERT INTO user(name,address,email,telephone) values ('".$name."','".$address."','".$email."','".$telephone."')";
                $result2=$connection->query($insertuser);
				//echo $insertuser;
				if($result2){
					$_GLOBAL['userdone']=1;
				}else{
					$_GLOBAL['userdone']=0;
				}
				
                if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['userdone']==1)){
                    echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: user_home_page.php");
                }else{
                    //echo "failed";
                }

            
        }        
    ?>
	
</html>
<?php require_once('footer.php')?>