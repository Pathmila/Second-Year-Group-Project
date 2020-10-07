<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(gid) from guide";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(gid)'];
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
				$gid=$_POST['gid'];
				$name=$_POST['name'];
				$username=$_POST['uname'];
                $password=$_POST['cpassword'];
                $address=$_POST['address'];
                $birthday=$_POST['birthday'];
                $description = $_POST['description'];
                $email= $_POST['email'];
                $telephone =$_POST['telephone'];
                $availability=$_POST['avail'];
				$photo=$nextid;


//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$gid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
            
//insert data to guide  table

		    	$insertguide = "INSERT INTO guide(name,birthday,address,telephone,email,description,photo) values ('".$name."','".$birthday."','".$address."','".$telephone."','".$email."','".$description."','".$photo."')";
                $result2=$connection->query($insertguide);
		    	
		    	if($result2){
		    		$_GLOBAL['guidedone']=1;
		    	}else{
		    		$_GLOBAL['guidedone']=0;
                }
                
 //insert in to account availabilty table
				$insertguideavailability = "INSERT INTO guideavailability(gid,availability) values ('".$gid."','".$availability."')";
				$result3=$connection->query($insertguideavailability);
				if($result3){
					$_GLOBAL['guideavailability']=1;
				}else{
					$_GLOBAL['guideavailability']=0;
				}   
						
				 if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1) && ($_GLOBAL['guideavailability']==1)){
                    echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: user_home_page.php");
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
        <!--<link rel="stylesheet" type="text/css" href="../css/guide_signup.css">-->
		<link rel="stylesheet" type="text/css" href="../css/user_signup_page.css">
		<!-- Put this into guide sign-up Css page -->
		<style>
			body{
				color:white;
			}
		</style>
		<!-------------------------------------------->
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <!--<form method="post" action="guide_sign_up.php" enctype="multipart/form-data">               -->
				<form method="post" action="guide.php" enctype="multipart/form-data">
                    <p class="para">Guide Signup</p>
<!-- guide Id --> 
<!-- guide name -->                   
                    <div class='row'>
						<div class='col-50'>
                            <h3>Guide ID:</h3>
                                <input name="gid" id="gid" type="text" value= <?php echo $nextid ;?>  readonly>
						</div>
						<div class='col-50'>
                            <h3>Name:</h3>
                                <input name="name" id="name" placeholder="Name" type="text" required >
						</div>
                    </div>
<!-- guide  -->   
<!-- guide Address -->

                    <div class='row'>
						<div class='col-50'>
							<h3>Userame:</h3>
                                <input name="uname" id="uname" placeholder="Username" type="text" required >
						</div>
						<div class='col-50'>
                            <h3>Address:</h3>
                                <input name="address" id="address" placeholder="Address" type="text" required >
                        </div>
                    </div>

<!-- guide Email --> 
<!-- guide Telephone -->
                    
                    <div class='row'>
						<div class='col-50'>
							<h3>Email:</h3>	
                            <input name="email" id="email" placeholder="Email" type="email" required >
						</div>
						<div class='col-50'>
							<h3>Password:</h3>
                            <input type="password" name="password"  id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <!-- guide password --> 
<!-- guide comfirm password -->               

					<div class='row'>
						<div class='col-50'>
							<h3>Telephone No:</h3>
                            <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required >
						</div>
						<div class='col-50'>
							<h3>Confirm the Password:</h3>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
                        </div>
					</div>
                    <div class='row'>
<!-- guide Birthday --> 
<!-- guide Description -->                  
                        <div class='row'>
						<div class='col-50'>
							<h3>Brith Day:
                            <input name="birthday"  id="birthday" placeholder="birth day" type="date" required ></h3>	
						</div>
						<div class='col-50'>
                            <h3>Description:</h3>	
                                <input name="description" id="description" placeholder="description" type="text" required >
						</div>
                    </div>
<!-- guide Image --> 
<!-- guide availability -->     

                   <div class='row'>						
						<div class='col-50'>
							<h3>Availability:</h3>
                                <input  type="radio" name="avail" value=1>Yes                                     
                                <input type="radio" name="avail" value=0>No                       
                        </div>
						<div class='col-50'>
							<h3> Select image to upload:</h3>	
                                <input type="file" name="image" id="image" style="color:white;">
                        </div>
                    </div>
					<div class='row'> 
						<br /><br />
					</div>
					
<!-- terms and consditions --> 
					<div class='row'> 
                        <input type="checkbox" id="check" name="check" required>
                        <label for="check" ><a href="guide_terms_and_condition.php" class="sign-up">I Agree To The Terms And Conditions</a></label><br>
                    </div>
<!-- submit --> 
                  
                    <div class='row'>
                        <input type="submit" name="formsubmit" value="SIGN IN" class="packbtn">
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
    
  
</html>
<?php require_once('footer.php')?>