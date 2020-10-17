<?php require_once('user_nonnavigation.php')?> 
<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(photo) from guide";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(photo)'];
    $nextid=$maxid+1;
?>
<?php
        if(isset($_POST['formsubmit'])){
			$targetdir = '../images/guide/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;
			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			}
        }        
?>
	<?php
		$_GLOBAL['accountdone']=0;
        $_GLOBAL['guidedone']=0;
        $_GLOBAL['guideavailability']=0;

            if(isset($_POST['formsubmit'])){
				$name=$_POST['name'];
				$username=$_POST['uname'];
                $password=$_POST['cpassword'];
                $address=$_POST['address'];
                $birthday=$_POST['birthday'];
                $description = $_POST['description'];
                $email= $_POST['email'];
                $telephone =$_POST['telephone'];
                $availability=$_POST['availability'];
				$photo=$nextid;

//insert data to guide  table

		    	$insertguide = "INSERT INTO guide(name,birthday,address,telephone,email,description,photo) values ('".$name."','".$birthday."','".$address."','".$telephone."','".$email."','".$description."','".$photo."')";
                 $result2=$connection->query($insertguide);
		    	
		    	if($result2){
		    		$_GLOBAL['guidedone']=1;
		    	}else{
		    		$_GLOBAL['guidedone']=0;
                }
                
				$sql8="select max(gid) from guide";
				$result8=mysqli_query($connection,$sql8);
				$max=mysqli_fetch_assoc($result8);
				$maxgid=$max['max(gid)'];

//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$maxgid."','".$username."','".$password."',2)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
            

 //insert in to account availabilty table
				$insertguideavailability = "INSERT INTO guideavailability(gid,availability) values ('".$maxgid."','".$availability."')";
				$result=$connection->query($insertguideavailability);
				if($result){
					$_GLOBAL['guideavailability']=1;
				}else{
					$_GLOBAL['guideavailability']=0;
				}
               if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1) && ($_GLOBAL['guideavailability']==1)){
                   echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: login_page.php");
                }else{
                    //echo "failed";
					echo "<script> alert('Registration is Failed') </script>";
					header("Location: login_page.php");
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
        <form method="post" action="guide_signup_page.php" enctype="multipart/form-data">
         
			<h2 class="title"><label>Guide SignUp</label></h2>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Name:</label>
            </div>
            <div class="col-75">
                <input name="name" id="name" placeholder="Enter Name" type="text" required >
            </div>
            </div>		
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Address:</label>
            </div>
            <div class="col-75">
                <input name="address" id="address" placeholder="Enter Address" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Email:</label>
            </div>
            <div class="col-75">
                <input name="email" id="email" placeholder="Enter Email" type="email" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Telephone No:</label>
            </div>
            <div class="col-75">
                <input name="telephone" id="telephone" placeholder="Enter Telephone" type="tel" pattern="[0-9]{10}" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Birthday:</label>
            </div>
            <div class="col-75">
                <input name="birthday" id="birthday" type="date" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Details:</label>
            </div>
            <div class="col-75">
                <input type="text" name="description" placeholder="Enter details" required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">User Name:</label>
            </div>
            <div class="col-75">
                <input name="uname" id="uname" placeholder="Enter User Name" type="text" required >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Confirm Password:</label>
            </div>
            <div class="col-75">
                <input type="password" name="cpassword" placeholder="Confirm Password" required>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label for="fname">Availability:</label>
            </div>
            <div class="col-75">
				<br />
                <INPUT type="radio" name="availability" Value="1">Yes
				<INPUT type="radio" name="availability" Value="0">No
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
