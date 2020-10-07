

<?php 
    require_once('connect.php');
    session_start();
    $sql4="SELECT max(hid) from hotel";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(hid)'];
    $nexthid=$maxid+1;
?>

<?php


        if(isset($_POST['submit'])){
			$targetdir = '../images/category/';   
			$name=$nexthid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			echo "Asini";

			$filename=$nexthid;
			
			
				$hid=$_POST['hid'];
				$name=$_POST['name'];
				$email=$_POST['email'];
				$address=$_POST['address'];
				$telephone=$_POST['telephone'];
				$username=$_POST['username'];
				$photo=$nexthid;
				$description=$_POST['description'];
				$password=$_POST['password'];
				$singlerooms=$_POST['singlerooms'];
				$singleroomprice=$_POST['singleroomprice'];
				$doublerooms=$_POST['singlerooms'];
				$doubleroomprice=$_POST['singleroomprice'];
				$familyrooms=$_POST['singlerooms'];
				$familyroomprice=$_POST['singleroomprice'];
				$sroomno=$_POST['sroomno'];
				$droomno=$_POST['droomno'];
				$froomno=$_POST['froomno'];

				echo "Asini";
				
				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$hid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
					
				}else{
					$_GLOBAL['accountdone']=0;
				}
				
			}
                    
    ?>


<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_signup.css">
    </head>
    <body>
	<div class="container">
		<form  method="post" action="hotel_signup.php" enctype="multipart/form-data">
			<h2>Hotel Signup</h2>
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>User ID </h3>
						<input class="input" type="text" name="hid" value=<?php echo $nexthid ;?>  readonly>
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>User Name </h3>
						<input class="input" type="text" name="username" required>
					</div>
				</div>
			</div>

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Name </h3>
						<input class="input" type="text" name="name" required>
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>Address</h3>
						<input class="input" type="text" name="address" required>
					</div>
				</div>
			</div>	

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Password </h3>
						<input class="input" type="password" name="password" required>
					</div> 
				</div>	
				<div class="inputbox">
					<div>
					<h3>Confirm Password </h3>
						<input class="input" type="password" name="password" required>
					</div>
				</div>
			</div>
			
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Telephone Number</h3>
						<input class="input" type="tel" name="telephone" required>
					</div>
				</div>

				<div class="inputbox">
					<div>
						<h3>Email</h3>
						<input class="input" type="email" name="email" required>
					</div>
				</div>
			</div>	
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
						<h3>Description</h3>
						<textarea class="input" type="text" name="description" ROWS=“5” COLS=“60”></textarea>
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
						<h3>Image</h3>
						<input type="file" name="image" id="image" required>
					</div>
				</div>
			</div>	
			<table class="tablestyle">
 				<tr>
   					 <th>Type of the Room</th>
   					 <th>Number of Rooms</th> 
   					 <th>Price[RS]</th>
  				</tr>
 				 <tr>
				  	 <td>Single Rooms</td>
  					 <td><div class="inputbox">
					   		<input class="input" type="number" name="singlerooms" required>
							
						</div>
					</td>
  					 <td><div class="inputbox">
					   		<input class="input" type="number" name="singleroomprice" required>
					
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms</td>
					 <td><div class="inputbox">
					   		<input class="input" type="number" name="doublerooms" required>
						
						</div>
					</td>
  					 <td><div class="inputbox">
					   		<input class="input" type="number" name="doubleroomprice" required>
							
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms</td>
    				<td><div class="inputbox">
					   		<input class="input" type="number" name="familyrooms" required>
							
						</div>
					</td>
  					 <td><div class="inputbox">
					   		<input class="input" type="number" name="familyroomprice" required>
							
						</div>
					</td>
  				</tr>
			</table>	
			<table class="tablestyle">
 				<tr>
   					 <th>Type of the Room</th>
   					 <th>No of Current Available Rooms</th> 
  				</tr>
 				 <tr>
				  	<td>Single Rooms</td>
  					 <td><div class="inputbox">
					   		<input class="input" type="number" name="sroomno" required>
							
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms</td>
					 <td><div class="inputbox">
							   <input class="input" type="number" name="droomno" required>
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms</td>
    				<td><div class="inputbox">
					   		<input class="input" type="number" name="froomno" required>
						</div>
					</td>
  				</tr>
			</table>	
			<div class="lblstyle">
				<input type="checkbox" name="terms"><a href="hotel_agree.php">I accept terms and conditions..</a> 
			</div>

			<input type="submit" class="btn" value="Submit" name="submit">
				
		</form>		
	</div>	
				
</body>


</html>

<?php require_once('footer.php')?>