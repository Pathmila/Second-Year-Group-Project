<?php require_once('vehicle_navigation.php')?> 
<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(vid) from vehicle";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(vid)'];
    $nextvid=$maxid+1;
?>
<?php
        if(isset($_GET['formsubmit'])){
			$targetdir = '../images/vehicle/';   
			$name=$nextvid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_file['image']['tmp_name'], $targetfile)) {
			
				echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			
            $uname=$_GET['name'];
            //$file=$_POST['image'];
            //echo $file;
            //$cat=$_POST['cat'];

			$filename=$nextvid;

            $sql2="INSERT INTO vehicle(name,photo) values ('".$name."','".$photo."')"; 
			echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
				echo "<script> alert('Insert is Sucessfull') </script>";				
				header("Location:vehicle_sign_up.php");
            }else{
				echo "failed";
				header("Location: vehicle_signup.php");
            } 
        }        
    ?>

<?php
		$_GLOBAL['accountdone']=0;
		$_GLOBAL['vehicledone']=0;

        if(isset($_POST['formsubmit'])){
				$vid=$_POST['vid'];
				$type=$_POST['type'];
				$name=$_POST['name'];
				$username=$_POST['uname'];
                $password=$_POST['cpassword'];
                $address=$_POST['address'];
                $birthday=$_POST['birthday'];
                $details = $_POST['details'];
                $email= $_POST['email'];
                $telephone =$_POST['telephone'];
                


				//insert in to account table
				$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$vid."','".$username."','".$password."',0)";
				$result=$connection->query($insertaccount);
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
               

                //insert data to vehicle  table

		    	$insertvehicle = "INSERT INTO vehicle(name,type,address,details,email,telephone) values ('".$name."','".$type."','".$address."','".$details."','".$email."','".$telephone."')";
                 $result2=$connection->query($insertvehicle);
		    	
		    	if($result2){
		    		$_GLOBAL['vehicledone']=1;
		    	}else{
		    		$_GLOBAL['vehicledone']=0;
		    	}
				
               if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['vehicledone']==1)){
                   //  echo "<script> alert('Registration is Sucessfull') </script>";
						header("Location: vehicle_home_page.php");
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
        <link rel="stylesheet" type="text/css" href="../css/vehicle_sign_up.css">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <form method="get" action="vehicle_signup.php">               
                    <p class="para">Vehicle Signup</p>
					
                    <div class='row'>
						<div class='col-50'>
                            <h3>Vehicle ID:</h3>
                            <input name="vid" id="vid" type="text" value= <?php echo $nextvid ;?>  readonly>
						</div>
						<div class='col-50'>
                            <h3>Type:</h3>
                            <input name="type" id="type" type="text" placeholder="Type of the Vehicle" required>
						</div>
                    </div>
					
                    <div class='row'>
						<div class='col-50'>
                            <h3>Owner's Name:</h3>
                            <input name="name" id="name" placeholder="Owner's Name" type="text" required >
						</div>
						<div class='col-50'>
							<h3>Userame:</h3>
                            <input name="uname" id="uname" placeholder="Username must be your Vehicle Number" type="text" required >
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
						<div class='col-60'>
                            <h3>Address:</h3>
						</div>
						<div class="col-75">						
                            <input name="address" id="address" placeholder="Address" type="text" required >
                        </div>
					</div>
						
					<div class='row'>
						<div class='col-60'>
                            <h3>Description:</h3>
						</div>
						<div class="col-75">						
                            <textarea id="details" name="details" placeholder="Write the message.." rows="3" cols="90"></textarea>
                        </div>
					</div>	
                   
                    <div class='row'>
						<div class='col-50'>
							<h3> Select image to upload:</h3>	
                            <input type="file" name="photo" id="photo"></div>
						<div class='col-50'>
							<h3>Availability:</h3>
                            <input  type="radio" id="yes" name="availability" value="yes">
                                <label class="label_1">YES</label><br>
                             <input type="radio" id="yes" name="availability" value="no">
                                <label class="label_1">NO</label><br>
                            </div>
                    </div>
					<br/>

                    <div class='row'>
                        <input type="checkbox" id="check" name="check" required>
                        <label for="check" ><a href="vehicle_terms_and_condition.php" class="sign-up">I Agree To The Terms And Conditions</a></label><br>
                    </div>
                    <br/>
                    <div class='row'>
                        <input type="submit" name="formsubmit" value="SIGN IN" class="packbtn">
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
    
  
</html>
<?php require_once('footer.php')?>