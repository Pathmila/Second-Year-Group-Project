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

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/guide_signup.css">
    </head>
    <body>
        <div class="container">
        <form method="get" action="user_signup_page.php">
            
			<h2 class="title"><label>User SignUp</label></h2>
            
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Name:</label>
            </div>
            <div class="col-75">
                <input name="name" id="name" placeholder="Enter Name" type="text" required >
            </div>
            </div>		
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Address:</label>
            </div>
            <div class="col-75">
                <input name="address" id="address" placeholder="Address" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Email:</label>
            </div>
            <div class="col-75">
                <input name="email" id="email" placeholder="Email" type="email" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Telephone No:</label>
            </div>
            <div class="col-75">
                <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">User Name:</label>
            </div>
            <div class="col-75">
                <input name="uname" id="uname" placeholder="Username" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Confirm Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="cpassword" placeholder="Confirm Password" required>
            </div>
            </div>
			
			<div class="row">
			<div class="middle">
				<br />
				<input type="checkbox" id="check" name="check" required>
                <label for="check" ><a href="Easy Travels Terms & Conditions.pdf" class="sign-up">I Agree To The Terms And Conditions</a></label><br />
			</div>
			</div>
			
            <div class="row">
                <input type="submit" name="formsubmit" value="SIGN UP" class="formbtn">
            </div>
        </form>
        </div>
    </body>
	
	
	
</html>
<?php require_once('footer.php')?>