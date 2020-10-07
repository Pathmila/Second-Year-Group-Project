
<?php 
    require_once('connect.php');
    session_start();
    $sql4="SELECT max(hid) from hotel";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(hid)'];
    $nexthid=$maxid+1;
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
                <form method="post" action="hotel.php" enctype="multipart/form-data">
                    <p class="para"> User Signup</p>
                    <div class='row'>
						<div class='col-50'>
                            <h3>ID:</h3>
                            <input name="uid" id="uid" type="text" value=<?php echo $nexthid ;?>  readonly>
						</div>
						<div class='col-50'>
                            <h3>Name:</h3>
                            <input name="name" id="name" placeholder="Name" type="text"  >
						</div>
                    </div>
                    <div class='row'>
						<div class='col-50'>
							<h3>Userame:</h3>
                            <input name="uname" id="uname" placeholder="Username" type="text"  >
						</div>
						<div class='col-50'>
                            <h3>Address:</h3>
                            <input name="address" id="address" placeholder="Address" type="text"  >
                        </div>
                    </div>
                    <div class='row'>
						<div class='col-50'>
							<h3>Email:</h3>	
                            <input name="email" id="email" placeholder="Email" type="email"  >
						</div>
						<div class='col-50'>
							<h3>Telephone No:</h3>
                            <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}"  >
                        </div>
					</div>
					<div class='row'>
						<div class='col-50'>
							<h3>Password:</h3>
                            <input type="password" name="password" placeholder="Password" >
						</div>
						<div class='col-50'>
							<h3>Confirm the Password:</h3>
                            <input type="password" name="cpassword" placeholder="Confirm Password" >
                        </div>
					</div>
					<div class="row">
					<div class="col-25">
						<label for="lname">Upload a photo</label>
					</div>
					<div class="col-75">
						<input type="file" name="image" id="image" >
					</div>
					</div>
                    <div class='row'>
                        <input type="checkbox" id="check" name="check" >
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

        if(isset($_POST['submit'])){
				$uid=$_GET['uid'];
				$name=$_GET['name'];
				$username=$_GET['uname'];
				$password=$_GET['cpassword'];
				
				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$uid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
					echo "Asini";
				}else{
					$_GLOBAL['accountdone']=0;
				}
                //print_r($result);
			/*	
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
*/
            
        }        
    ?>
	
</html>
<?php require_once('footer.php')?>