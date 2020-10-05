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

		while($row=$result->fetch_assoc()){
				$hid=$row['hid'];
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
        }
    }
?>

<?php
		
        if(isset($_POST['submit'])){
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

			//update hotel table
			$sql1 = "UPDATE hotel SET name ='".$name."', address ='".$address."', email ='".$email."', telephone ='".$telephone."',  photo ='".$filename."' where uid='".$hid."' & username='".$username."'";   
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				$_GLOBAL['hoteldone']=1;
			}else{
				$_GLOBAL['hoteldone']=0;
			}

		}        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/hotel_update.css">
    </head>
    <body>
	<div class="container">
		<form  method="post" action="hotel_update.php">
			<h2>Hotel Update</h2>

			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Name:</h3>
						<input class="input" type="text" id="name" name="name" >
					</div>
				</div>
				<div class="inputbox">
					<div>
						<h3>Address:</h3>
						<input class="input" type="text" id="address" name="address" >
					</div>
				</div>
			</div>	
			
			<div class="inlineinput">
				<div class="inputbox">
					<div>
						<h3>Telephone Number:</h3>
						<input class="input" type="tel" id="telephone" name="telephone" >
					</div>
				</div>

				<div class="inputbox">
					<div>
						<h3>Email:</h3>
						<input class="input" type="email" id="email" name="email" >
					</div>
				</div>
			</div>	
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
					<lable><h3>Description:</h3></lable>
						<textarea class="input" type="text" name="description" id="description" ROWS=“10” COLS=“80”></textarea>
					</div>
				</div>
			</div>
			<div class="inlineinput">
				<div class="inputbox">	
					<div>
						<h3>Image:</h3>
						<input class="inputimg" type ="file" accept = "image/*" id="image" name="image" >
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
				  	 <td>Single Rooms:</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="singlerooms" name="singlerooms" >
							
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="singleroomprice" name="singleroomprice" >
					
						</div>
					</td>
  				</tr>
 				 <tr>
    		 		<td>Double Rooms:</td>
					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="doublerooms" name="doublerooms" >
						
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="doubleroomprice" name="doubleroomprice" >	
						</div>
					</td>
  				</tr>
  				<tr>
    				<td>Family Rooms:</td>
    				<td><div class="tableinputbox">
					   		<input class="input" typy="number" id="familyrooms" name="familyrooms" >
							
						</div>
					</td>
  					 <td><div class="tableinputbox">
					   		<input class="input" typy="number" id="familyroomprice" name="familyroomprice" >
							
						</div>
					</td>
  				</tr>
			</table>		
			<input type="submit" class="btn" value="Submit" name="submit">	
		</form>		
	</div>			
</body>
</html>

<?php require_once('footer.php')?>