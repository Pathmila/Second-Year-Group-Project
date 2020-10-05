<?php require_once('hotel_navigation.php')?> 
<?php require_once('menu.php')?>
<?php require_once('connect.php')?>

<?php 
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    

    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM hotel h, account a WHERE h.hid=a.uid AND username='$username'";
        //echo $sql;
        $result=mysqli_query($connection,$sql);
				
        }
?>
<?php
		
        if(isset($_POST['submit'])){

			//delete hotel table
			$sql1 = "DELETE hotel where uid='".$hid."' & password='".$password."'";   
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				$_GLOBAL['hoteldone']=1;
				echo "<script> alert('Account deletion is Sucessfull') </script>";
					header("Location: index.php");
			}else{
				$_GLOBAL['hoteldone']=0;
				echo "<script> alert('Account deletion is Unsucessfull') </script>";
			}

		}        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_delete.css">
    </head>
    <body>
	<div class="container">
		<form  method="post" action="hotel_delete.php">
		<h3>Enter the Password to Delete the Account:</h3>
				<div class="inputbox">
					<div>
						<input class="input" type="text" id="password" name="password"  readonly>
					</div>
				</div>	
			<input name="submit" type="Submit" class="btn" value="SUBMIT">
		</form>		
	</div>			
</body>
</html>
<?php require_once('footer.php')?>        