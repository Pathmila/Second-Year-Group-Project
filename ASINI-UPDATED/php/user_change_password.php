<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
	//echo $_SESSION['username'];
	$uname=$_SESSION['username'];
	
	$sql="SELECT * FROM user u, account a WHERE u.uid=a.uid AND username='$uname'";
	$result = mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$uid=$row['uid'];
		$pass=$row['password'];
		//echo $uid;
	}
?>
<?php require_once('user_navigation.php')?> 

<?php
		
    if(isset($_GET['submit'])){
        $password=$_GET['password'];
		$npassword=$_GET['newpassword'];
		$ncpassword=$_GET['confirmpassword'];
			
		if(($npassword == $ncpassword)&&($pass == $password)){
			//echo "ASINI";
			echo "<script> alert('Password update is Sucessfull') </script>";
		}else{
			echo "Failed";
		}
	}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
        <?php require_once('user_view_profile_navigation.php')?>
		<div class="container">
        <form method="GET" action="user_change_password.php">
            <label style="font-size:30px" align="center">Change Password</label>

            <div class="row">
            <div class="col-25">
                <label>Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>New Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="newpassword" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Confirm Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="confirmpassword" required>
            </div>
            </div>

            

            
            <div class="row">
				<input type="submit" name="submit" value="Update" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>