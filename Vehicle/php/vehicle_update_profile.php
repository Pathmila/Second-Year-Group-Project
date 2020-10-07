<?php require_once('connect.php');
	session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php require_once('vehicle_navigation.php')?>

<?php 
    $uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];
    

    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM vehicle v, account a WHERE v.vid=a.uid AND username='$uname'";
        //echo $sql;
        $result=mysqli_query($connection,$sql);

		while($row=$result->fetch_assoc()){
			$vid=$row['vid'];
			//echo $uid;
			$type=$row['type'];
            $name=$row['name'];
            $address=$row['address'];
            $email=$row['email'];
            $telephone=$row['telephone'];
			$photo=$row['photo'];
			$details=$row['details'];
        }
    }
?> 

<?php

		$_GLOBAL['accountdone']=0;
		$_GLOBAL['vehicledone']=0;
		
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

			//update vehicle table
            $sql2 = "UPDATE vehicle SET name ='".$name."', address ='".$address."', email ='".$email."',type ='".$type."', details ='".$details."', photo ='".$photo."', telephone ='".$telephone."' where uid='".$userid."'";   
            //echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
					$_GLOBAL['vehicledone']=1;
				}else{
					$_GLOBAL['vehicledone']=0;
				}
				
                if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['vehicledone']==1)){
                    echo "<script> alert('Submition is Sucessfull') </script>";
					header("Location: vehicle_view_profile.php");
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
        <link rel="stylesheet" type="text/css" href="../css/view_style.css">
    </head>
    <body>     
        <?php require_once('view_navigation.php')?>
		<div class="container">
        <form method="GET" action="vehicle_update_profile.php">
            <label style="font-size:30px" align="center">Update Profile</label>
			
			<div class="row">
            <div class="col-25">
                <label>Vehicle ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="vid" value="<?php echo $vid?>"readonly>
            </div>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Owner's Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Type:</label>
            </div>
            <div class="col-75">
                <input type="text" name="type"  value="<?php echo $type?>">
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
                <input type="text" name="address"  value="<?php echo $address?>">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email"  value="<?php echo $email?>">
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
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="text" name="discription" value="<?php echo $details?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Old Image of the Vehicle:</label>
            </div>
            <div class="col-75">
                 <input type="image" src="../images/avatar1.png"  style="align:center" width="48" height="48" disabled>  
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Select image to upload:</label>
            </div>
            <div class="col-75">
            <input type="file" name="photo" id="photo">
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