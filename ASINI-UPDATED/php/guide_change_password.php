<?php require_once('connect.php');
    session_start();
	$uname=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
?>
<?php require_once('guide_navigation.php')?> 
<?php require_once('guide_view_navigation.php')?>

<?php 

	
	//echo $aid;	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$id=(string)$row['uid'];
		$pw=(string)$row['password'];
		$uname=(string)$row['username'];
	}
?>

<?php
		
    if(isset($_GET['submit'])){
        $password=$_GET['password'];
		$npassword=$_GET['newpassword'];
		$ncpassword=$_GET['confirmpassword'];
		//echo $password;
		//echo $pw;
		//echo $npassword;
		//echo $ncpassword;
		if(($npassword == $ncpassword)&&($pw == $password)){
			$sql1 = "UPDATE account SET password ='".$ncpassword."' where aid='".$aid."'"; 
			//echo $sql1;
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				echo "<script> alert('Password update is sucessfull') </script>";
			}else{
				echo "<script> alert('Password update is failed') </script>";
			}
		}else{
			//echo "Failed";
			echo "<script> alert('Password update is failed') </script>";
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
		<div class="container">
        <form method="GET" action="guide_change_password.php">
			<h2 class="title"><label>Change Password</label></h2>

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