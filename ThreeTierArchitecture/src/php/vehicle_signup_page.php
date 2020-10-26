<?php require_once('user_nonnavigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(photo) from vehicle";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(photo)'];
    $nextid=$maxid+1;
	//echo $maxid;
?>
<?php
    if(isset($_POST['formsubmit'])){
		$targetdir = '../../public/images/vehicle/';   
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
		$vid=$_POST['vid'];
		$owner=$_POST['owner'];
		$username=$_POST['uname'];
        $password=$_POST['cpassword'];
        $address=$_POST['address'];
        $type=$_POST['type'];
        $description = $_POST['description'];
        $email= $_POST['email'];
        $telephone =$_POST['telephone'];
        $availability=$_POST['availability'];
		$photo=$nextid;
				

//insert data to guide  table

		$insertguide = "INSERT INTO vehicle(vid,name,email,address,telephone,type,details,photo) values ('".$vid."','".$owner."','".$email."','".$address."','".$telephone."','".$type."','".$description."','".$photo."')";
        $result2=$connection->query($insertguide);
		    	
		if($result2){
		    $_GLOBAL['guidedone']=1;
		}else{
		    $_GLOBAL['guidedone']=0;
        }
				

//insert in to account table
		$insertaccount = "INSERT INTO account(uid,username,password,admin) values ('".$vid."','".$username."','".$password."',4)";
		//echo $insertaccount;
		$result=$connection->query($insertaccount);
		if($result){
			$_GLOBAL['accountdone']=1;
		}else{
			$_GLOBAL['accountdone']=0;
		}
          

                
 //insert in to account availabilty table
		$insertguideavailability = "INSERT INTO vehicleavailability(vid,availability) values ('".$vid."','".$availability."')";
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
        }
    }        
?>


<?php include('../../public/html/vehicle_signup_page.html')?>
<?php require_once('footer.php')?>
