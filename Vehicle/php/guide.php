<?php require_once('guide_navigation.php')?> 
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
			
				//echo "Done";
		//	} else { 
				//echo "Not uploaded";
			
			}
	
			
        }        
?>

	<?php
		$_GLOBAL['accountdone']=0;
		$_GLOBAL['guidedone']=0;

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
                


				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$gid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
               

                //insert data to guide  table

		    	$insertguide = "INSERT INTO guide(name,address,birthday,description,email,telephone) values ('".$name."','".$address."','".$birthday."','".$description."','".$email."','".$telephone."')";
                 $result2=$connection->query($insertguide);
		    	
		    	if($result2){
		    		$_GLOBAL['guidedone']=1;
		    	}else{
		    		$_GLOBAL['guidedone']=0;
		    	}
				
               if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1)){
                   //  echo "<script> alert('Registration is Sucessfull') </script>";
		    	
               }else{
                   //  echo "failed";
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
        <div class="login">
            <div class="login-form">
                <form method="post" action="guide_sign_up.php" enctype="multipart/form-data">               
                    <p class="para">Guide Signup</p>
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
                     <div class='row'>
						<div class='col-50'>
							<h3>Brith Day:</h3>	
                            <input name="birthday" id="birthday" placeholder="birth day" type="date" required >
						</div>
						<div class='col-50'>
                        <h3>description:</h3>	
                            <input name="description" id="description" placeholder="description" type="text" required >
							
                        </div>
                    </div>
                    
                    <div class='row'>
						<div class='col-50'>
							<h3>Email:</h3>	
                            <input name="email" id="email" placeholder="Email" type="email" required >
						</div>
						<div class='col-50'>
							<h3>Telephone No:</h3>
                            <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required >
                        </div>
                    </div>
                    
                   

                    <div class='row'>
						<div class='col-50'>
							<h3> Select image to upload:</h3>	
                            <input type="file" name="image" id="image" style="color:white;"></div>
						<div class='col-50'>
							<h3>Availability:</h3>
                            <input  type="radio" id="yes" name="availability" value="yes">
                                <label class="label_1">Yes</label><br>
                             <input type="radio" id="no" name="availability" value="no">
                                <label class="label_1">NO</label><br>
                            </div>
                    </div>
                

					<div class='row'>
						<div class='col-50'>
							<h3>Password:</h3>
                            <input type="password" name="password"  id="password" placeholder="Password" required>
						</div>
						<div class='col-50'>
							<h3>Confirm the Password:</h3>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
                        </div>
					</div>
                    <div class='row'>
                        <input type="checkbox" id="check" name="check" required>
                        <label for="check" ><a href="guide_terms_and_condition.php" class="sign-up">I Agree To The Terms And Conditions</a></label><br>
                    </div>
                    
                    <div class='row'>
                        <input type="submit" name="formsubmit" value="SIGN IN" class="packbtn">
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
    
  
</html>
<?php require_once('footer.php')?>