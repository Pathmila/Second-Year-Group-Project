<?php require_once('navigation.php')?> 

<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(hid) from hotel";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(hid)'];
    $nexthid=$maxid+1;
?>
	<?php

        if(isset($_POST['submit'])){
			
			$targetdir = '../images/hotel/';   
			$name=$nexthid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}

			$_GLOBAL['accountdone']=0;
			$_GLOBAL['hoteldone']=0;
			$_GLOBAL['hotelavailabilitydone']=0;


				$filename=$nexthid;
				$uid=$_POST['uid'];
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

				
				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$uid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
					
				}else{
					$_GLOBAL['accountdone']=0;
				}
				
				//print_r($result);
				
				//insert in to hotel table
				$inserthotel = "INSERT INTO hotel(name,address,email,telephone,description,photo,singlerooms,singleroomprice,doublerooms,doubleroomprice,familyrooms,familyroomprice) values ('".$name."','".$address."','".$email."','".$telephone."','".$description."','".$filename."','".$singlerooms."','".$singleroomprice."','".$doublerooms."','".$doubleroomprice."','".$familyrooms."','".$familyroomprice."')";
                $result1=$connection->query($inserthotel);
				if($result1){
					$_GLOBAL['hoteldone']=1;
				}else{
					$_GLOBAL['hoteldone']=0;
				}

				$inserthotelavailability = "INSERT INTO hotelavailability(uid,sroomno,droomno,froomno)  values ('".$uid."','".$sroomno."','".$droomno."','".$froomno."')";
				$result2=$connection->query($inserthotelavailability);
				if($result2){
					$_GLOBAL['hotelavailabilitydone']=1;
				}else{
					$_GLOBAL['hotelavailabilitydone']=0;
				}
				
                if( ($_GLOBAL['accountdone']==1) && ($_GLOBAL['hoteldone']==1) && ($_GLOBAL['hotelavailabilitydone']==1) ){
                    echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: login.php");
                }else{
                    echo "<script> alert('Registration is Failled') </script>";
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
				<h3>User ID:</h3>
					<div>
						<input class="input" type="text" id="uid" name="uid" value=<?php echo $nexthid ;?>  readonly>
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>User Name:</h3>
						<input class="input" type="text" id="username"  placeholder="User Name" name="username" required>
					</div>
				</div>
			</div>

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Name:</h3>
						<input class="input" type="text" id="name" placeholder="Name" name="name" required>
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>Address:</h3>
						<input class="input" type="text" id="address" placeholder="Address" name="address" required>
					</div>
				</div>
			</div>	

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Password:</h3>
						<input class="input" type="password" id="password" placeholder="Password" name="password" required>
					</div> 
				</div>	
				<div class="inputbox">
					<div>
					<h3>Confirm Password:</h3>
						<input class="input" type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
					</div>
				</div>
			</div>
			
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Telephone Number:</h3>
						<input class="input" type="tel" id="telephone" placeholder="Telephone Number" name="telephone" required>
					</div>
				</div>

				<div class="inputbox">
					<div>
						<h3>Email:</h3>
						<input class="input" type="email" id="email"  placeholder="Email" name="email" required>
					</div>
				</div>
			</div>	
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
					<h3>Description:</h3>
						<textarea class="input" type="text" name="description" placeholder="Enter description about your hotel." id="description" ROWS=“10” COLS=“80”></textarea>
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
						<h3>Upload Images:</h3>
						<input class="inputimg" type="file" id="image" name="image" required>
					</div>
				</div>
			</div>	
			<table class="tablestyle">
 				<tr>
   					 <th>Type of the Room</th>
   					 <th>Number of Rooms</th> 
					 <th>Price of Rooms[Rs]</th>
					 <th>No of Available Rooms</th>	
  				</tr>
 				 <tr>
				  	 <td>Single Rooms:</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="singlerooms" name="singlerooms"  required>
							
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="singleroomprice" name="singleroomprice" placeholder="Rs 0.00" required>
					
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="sroomno" name="sroomno"  required>
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms:</td>
					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="doublerooms" name="doublerooms"  required>
						
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="doubleroomprice" name="doubleroomprice" placeholder="Rs 0.00" required>	
						</div>
					</td>
					<td><div class="tableinputbox">
							   <input class="input" typy="number" id="droomno" name="droomno" required>
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms:</td>
    				<td><div class="tableinputbox">
					   		<input class="input" typy="number" id="familyrooms" name="familyrooms"  required>
							
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="familyroomprice" name="familyroomprice" placeholder="Rs 0.00" required>
							
						</div>
					</td>
					<td><div class="tableinputbox">
					   		<input class="input" typy="number" id="froomno" name="froomno"  required>
						</div>
					</td>
  				</tr>
			</table>	
			<div class="lblstyle">
				<input type="checkbox" name="terms" id="check" name="check" required><a href="hotel_agree.php">I accept terms and conditions..</a> 
			</div>
			<input type="submit" class="btn" value="Submit" name="submit">
				
		</form>		
	</div>			
</body>
</html>
	

<?php require_once('footer.php')?>