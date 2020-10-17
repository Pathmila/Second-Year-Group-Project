<?php require_once('user_nonnavigation.php')?>
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

        if(isset($_POST['formsubmit'])){
			
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
				$name=$_POST['name'];
				$email=$_POST['email'];
				$address=$_POST['address'];
				$telephone=$_POST['telephone'];
				$username=$_POST['uname'];
				$photo=$nexthid;
				$description=$_POST['description'];
				$password=$_POST['cpassword'];
				$singlerooms=$_POST['srooms'];
				$singleroomprice=$_POST['sprice'];
				$doublerooms=$_POST['drooms'];
				$doubleroomprice=$_POST['dprice'];
				$familyrooms=$_POST['frooms'];
				$familyroomprice=$_POST['fprice'];
				$saroomno=$_POST['sarooms'];
				$daroomno=$_POST['darooms'];
				$faroomno=$_POST['farooms'];

				
				
				
				//print_r($result);
				
				//insert in to hotel table
				$inserthotel = "INSERT INTO hotel(name,address,email,telephone,description,photo,singlerooms,singleroomprice,doublerooms,doubleroomprice,familyrooms,familyroomprice) values ('".$name."','".$address."','".$email."','".$telephone."','".$description."','".$filename."','".$singlerooms."','".$singleroomprice."','".$doublerooms."','".$doubleroomprice."','".$familyrooms."','".$familyroomprice."')";
                $result1=$connection->query($inserthotel);
				if($result1){
					$_GLOBAL['hoteldone']=1;
				}else{
					$_GLOBAL['hoteldone']=0;
				}

				$sql8="select max(hid) from hotel";
				$result8=mysqli_query($connection,$sql8);
				$max=mysqli_fetch_assoc($result8);
				$maxhid=$max['max(hid)'];
				//echo $maxhid;

				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$maxhid."','".$username."','".$password."',3)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
					
				}else{
					$_GLOBAL['accountdone']=0;
				}

				$inserthotelavailability = "INSERT INTO hotelavailability(hid,singlerooms,doublerooms,familyrooms)values('".$maxhid."','".$saroomno."','".$daroomno."','".$faroomno."')";
				$result2=$connection->query($inserthotelavailability);
				if($result2){
					$_GLOBAL['hotelavailabilitydone']=1;
				}else{
					$_GLOBAL['hotelavailabilitydone']=0;
				}
				
                if( ($_GLOBAL['accountdone']==1) && ($_GLOBAL['hoteldone']==1) && ($_GLOBAL['hotelavailabilitydone']==1) ){
					//echo $_GLOBAL['accountdone'];
					//echo $_GLOBAL['hoteldone'];
					//echo $_GLOBAL['hotelavailabilitydone'];
                    echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: login_page.php");
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
		<link rel="stylesheet" type="text/css" href="../css/guide_signup.css">
    </head>
    <body>
        <div class="container">
        <form method="post" action="hotel_signup.php" enctype="multipart/form-data">
			<h2 class="title"><label>Hotel SignUp</label></h2>
			
			<div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input name="name" id="name" placeholder="Enter Name" type="text" required >
            </div>
            </div>		
			
			<div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input name="address" id="address" placeholder="Enter Address" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input name="email" id="email" placeholder="Enter Email" type="email" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Telephone No:</label>
            </div>
            <div class="col-75">
                <input name="telephone" id="telephone" placeholder="Enter Telephone" type="tel" pattern="[0-9]{10}" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Details:</label>
            </div>
            <div class="col-75">
                <input type="text" name="description" placeholder="Enter details" required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>User Name:</label>
            </div>
            <div class="col-75">
                <input name="uname" id="uname" placeholder="Enter User Name" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Confirm Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="cpassword" placeholder="Confirm Password" required>
            </div>
            </div>
			
			
			<div class="row">
                <label style="font-weight:bold; font-size:20px;">Single Room Details</label>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of single rooms</label>
            </div>
            <div class="col-75">
                <input name="srooms" id="srooms" placeholder="Enter the no of single rooms in your hotel" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a single room</label>
            </div>
            <div class="col-75">
                <input name="sprice" id="sprice" placeholder="Enter the price of a single room in your hotel" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available single rooms</label>
            </div>
            <div class="col-75">
                <input name="sarooms" id="sarooms" placeholder="Enter the no of available single rooms today" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
                <label style="font-weight:bold; font-size:20px;">Double Room Details</label>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of double rooms</label>
            </div>
            <div class="col-75">
                <input name="drooms" id="drooms" placeholder="Enter the no of double rooms in your hotel" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a double room</label>
            </div>
            <div class="col-75">
                <input name="dprice" id="dprice" placeholder="Enter the price of a double room in your hotel" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available double rooms</label>
            </div>
            <div class="col-75">
                <input name="darooms" id="darooms" placeholder="Enter the no of available double rooms today" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
                <label style="font-weight:bold; font-size:20px;">Family Room Details</label>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of family rooms</label>
            </div>
            <div class="col-75">
                <input name="frooms" id="frooms" placeholder="Enter the no of family rooms in your hotel" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a family room</label>
            </div>
            <div class="col-75">
                <input name="fprice" id="fprice" placeholder="Enter the price of a family room in your hotel" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>No of available family rooms</label>
            </div>
            <div class="col-75">
                <input name="farooms" id="farooms" placeholder="Enter the no of available family rooms today" type="number" min="0" max="800" step="1" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo</label>
            </div>
            <div class="col-75">
                <br /><input type="file" name="image" id="image" required>
            </div>
            </div>
			
			<div class="row">
			<div class="middle">
				<br />
				<input type="checkbox" id="check" name="check" required>
                <label for="check" ><a href="Easy Travels Terms & Conditions.pdf" class="sign-up">I Agree To The Terms And Conditions</a></label><br />
			</div>
			</div>
			
            <div class="row">
                <input type="submit" name="formsubmit" value="SIGN UP" class="formbtn">
            </div>
        </form>
        </div>
    </body>
		
</html>
<?php require_once('footer.php')?>
