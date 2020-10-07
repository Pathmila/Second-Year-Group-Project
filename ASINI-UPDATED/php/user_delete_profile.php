<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<?php
	$uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];
	$uid;
	$aid;
	$GLOBAL['adone']=0;
	$GLOBAL['udone']=0;
	
	$sql1 = "select * from account where username = '$uname'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$uid = $row['uid'];
		$aid = $row['aid'];
		//echo $uid;
	}
	
	
	if(isset($_GET['submit'])){
		$pass=$_GET['password'];
		//echo $pass;
		//echo $password;
		if($password == $pass){
			$sql = "delete from user where uid = '$uid'";
			$result=mysqli_query($connection,$sql);
			$GLOBAL['udone'] = 1;
			//echo $GLOBAL['udone'];
		}
	}
?>
<?php
	$uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];
	$uid;
	$aid;
	
	$sql1 = "select * from account where username = '$uname'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$uid = $row['uid'];
		$aid = $row['aid'];
		//echo $uid;
	}
	
	
	if(isset($_GET['submit'])){
		$pass=$_GET['password'];		
		$sql2 = "delete from account where aid = '$aid'";
		$result2=mysqli_query($connection,$sql2);
		$GLOBAL['adone'] = 1;
		//echo $GLOBAL['adone'];
	}
?>
<?php
	if(isset($_GET['submit'])){
		if (($GLOBAL['udone'] == 1) && ($GLOBAL['adone']==1)){
			//echo $GLOBAL['udone'];
			//echo $GLOBAL['adone'];
			//echo "done";
			echo "<script> alert('Successfully Deleted') </script>";
			header("Location: user_nonhome_page.php");
		}else{
			echo "<script> alert('Invalid Password') </script>";
			//echo "failed";
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
        <form method="GET" action="user_delete_profile.php">
            <label style="font-size:30px" align="center">Delete Profile</label>


            <h3>Enter your password to delete your account...</h3>
            <div class="row">
            <div class="col-25">
                <label>Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="password">
            </div>
            </div>
            
            <div class="row">
				<input type="submit" name="submit" value="Delete" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>