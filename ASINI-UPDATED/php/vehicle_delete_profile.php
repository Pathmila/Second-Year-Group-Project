<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('vehicle_navigation.php')?> 

<?php
	$uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	
	$sql1 = "select * from account where aid = '".$aid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$uid = $row['uid'];
		$aid = $row['aid'];
		//echo $uid;
	}
	
	
	if(isset($_GET['submit'])){
		$pass=$_GET['password'];
		echo $pass;
		echo $password;
		if($password == $pass){
			$sql1 = "delete from vehicle where vid = '$uid'";
			$result1=mysqli_query($connection,$sql1);
			echo $sql;
			$GLOBAL['udone'] = 1;
			//echo $GLOBAL['udone'];
			
			$sql2 = "delete from vehicleavailability where vid = '$uid'";
			$result2=mysqli_query($connection,$sql2);
			$GLOBAL['avdone'] = 1;
			
			$sql3 = "delete from account where aid = '$aid'";
			$result3=mysqli_query($connection,$sql3);
			$GLOBAL['adone'] = 1;
			//echo $GLOBAL['adone'];
		}else{
			$GLOBAL['adone']=0;
			$GLOBAL['udone']=0;
			$GLOBAL['avdone']=0;
		}
		if (($GLOBAL['udone'] == 1) && ($GLOBAL['adone']==1) && ($GLOBAL['avdone']==1)){
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
        <?php require_once('vehicle_view_navigation.php')?>
		<div class="container">
        <form method="GET" action="vehicle_delete_profile.php">
            
			<h2 class="title"><label>Delete Profile</label></h2>


            <h3>Enter your password to delete your account...</h3><br/>
            <div class="row">
            <div class="col-25">
                <label>Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="password">
            </div>
            </div>
            <br/>
            <div class="row">
				<input type="submit" name="submit" value="Delete" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>