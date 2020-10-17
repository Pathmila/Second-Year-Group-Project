<?php require_once('user_nonnavigation.php')?> 
<?php require_once('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/login_page.css">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <form method="post" action="login_page.php">               
                    <img src="../images/login.gif" class="image" width="120px" height="120px">
                    <h3>Username:</h3>
                    <input type="text" name="username" placeholder="Username"><br>
                    <h3>Password:</h3>
                    <input type="password" name="password" placeholder="Password">
                    <br /><br />
                    <input type="submit" name="submit" value="Login" class="packbtn">
                    <br /><br />
                    <a class="sign-up" href="account_page.php">Don't You Have An Account?</a>
                    <br />
                </form>
            </div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>

<?php 

	//$_SESSION['loggedin']=1;
	if(isset($_POST['submit'])){
        $uname=$_POST['username'];
		$pwd=$_POST['password'];

        $sql="SELECT * FROM account WHERE username='".$uname."' AND password='".$pwd."'";

        $result=mysqli_query($connection,$sql);

		//echo "dd";
		//print_r ($result);
		if($result->num_rows==1){
			$user=$result->fetch_assoc();
			$_SESSION['loggedin']=1;
            $_SESSION['username']=$user['username'];
            $_SESSION['pwd']=$user['password'];
            $_SESSION['aid']=$user['aid'];
			$_SESSION['uid']=$user['uid'];
			if($user['admin']==1){
				$_SESSION['admin']=1;
			}else if($user['admin']==0){
                $_SESSION['admin']=0;
			}else if($user['admin']==2){
                $_SESSION['admin']=2;
			}else if($user['admin']==3){
                $_SESSION['admin']=3;
			}else if($user['admin']==4){
                $_SESSION['admin']=4;
			}else{
				
			}
			
			if($_SESSION['admin']==1){
				header("Location: admin_home_page.php");
			}else if($_SESSION['admin']==0){
				header("Location: user_home_page.php");
			}else if($_SESSION['admin']==2){
				header("Location: guide_home.php");
			}else if($_SESSION['admin']==3){
				header("Location: hotel_home_page.php");
			}else if($_SESSION['admin']==4){
				header("Location: vehicle_home_page.php");
			}else{
				header("Location: login_page.php");
			}
        }else{
            echo "<script type='text/javascript'>alert('Invalid Username Password');</script>";
        }
	}
?>
