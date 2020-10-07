<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
?>
<?php require_once('vehicle_navigation.php')?> 

<?php

		$_GLOBAL['accountdone']=0;
		$_GLOBAL['vehicledone']=0;
		
        if(isset($_GET['submit'])){
            $password=$_GET['password'];
			
            

			//delete account table
			$sql1 = "DELETE FROM account WHERE uid = " .$_GET['uid'];   
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				$_GLOBAL['accountdone']=1;
			}else{
				$_GLOBAL['accountdone']=0;
			}

			//delete vehicle table
            $sql2 = "DELETE FROM vehicle WHERE vid = " .$_GET['vid']; 
            //echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
					$_GLOBAL['vehicledone']=1;
				}else{
					$_GLOBAL['vehicledone']=0;
				}
				
                if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['vehicledone']==1)){
                    echo "<script> alert('Successfully Deleted') </script>";
					header("Location: vehicle_signup.php");
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
        <form method="GET" action="vehicle_delete_profile.php">
            <label style="font-size:30px" align="center">Delete Profile</label>


            <h3>Enter your password to delete your account...</h3><br/>
            <div class="row">
            <div class="col-25">
                <label>Password:</label>
            </div>
            <div class="col-75">
                <input type="text" name="password">
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