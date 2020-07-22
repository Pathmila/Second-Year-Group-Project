<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<?php 
    $uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];
    

    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM user u, account a WHERE u.uid=a.uid AND username='$uname'";
        //echo $sql;
        $result=mysqli_query($connection,$sql);

		while($row=$result->fetch_assoc()){
			$uid=$row['uid'];
			//echo $uid;
            $name=$row['name'];
            $address=$row['address'];
            $email=$row['email'];
            $telephone=$row['telephone'];
        }
    }
?>

<?php

		$_GLOBAL['accountdone']=0;
		$_GLOBAL['userdone']=0;
		
        if(isset($_GET['updatebtn'])){
            $name=$_GET['name'];
			$uname=$_GET['uname'];
			$address=$_GET['address'];
			$email=$_GET['email'];
			$telephone=$_GET['telephone'];
			$userid=$_GET['uid'];
			$_SESSION['username']=$uname;
            

			//update account table
			$sql1 = "UPDATE account SET username ='".$uname."' where uid='".$userid."'";   
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				$_GLOBAL['accountdone']=1;
			}else{
				$_GLOBAL['accountdone']=0;
			}

			//update user table
            $sql2 = "UPDATE user SET name ='".$name."', address ='".$address."', email ='".$email."', telephone ='".$telephone."' where uid='".$userid."'";   
            //echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
					$_GLOBAL['userdone']=1;
				}else{
					$_GLOBAL['userdone']=0;
				}
				
                if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['userdone']==1)){
                    echo "<script> alert('Submition is Sucessfull') </script>";
					header("Location: view_profile_page.php");
                }else{
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
        <form method="GET" action="user_update_profile.php">
            <label style="font-size:30px" align="center">Update Profile</label>
			            <div class="row">
            <div class="col-25">
                <label>User ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uid" value="<?php echo $uid?>" readonly>
            </div>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone(+94):</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone" value="<?php echo $telephone?>" >
            </div>
            </div>
            <div class="row">
				<input type="submit" name="updatebtn" value="Update" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>