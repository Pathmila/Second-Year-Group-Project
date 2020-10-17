<?php require_once('vehicle_navigation.php')?> 

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
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."' ";

	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
		$uname=(string)$row['username'];
		$_SESSION['username']=$uname;
		$uid=(string)$row['uid'];
    }
    

    if($_SESSION['loggedin']==1){
        $sql="SELECT * FROM vehicle v, account a WHERE v.vid=a.uid AND username='$uname'";
        //echo $sql;
        $result=mysqli_query($connection,$sql);

		while($row=$result->fetch_assoc()){
			$vid=$row['vid'];
			//echo $uid;
			$type=$row['type'];
            $name=$row['name'];
            $address=$row['address'];
            $email=$row['email'];
            $telephone=$row['telephone'];
			$photo=$row['photo'];
			$details=$row['details'];
        }
    }
?> 
<?php
        if(isset($_POST['updatebtn'])){
			$targetdir = '../images/vehicle/';   
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

        if(isset($_POST['updatebtn'])){
			$name=$_POST['name'];
			$username=$_POST['uname'];
            $address=$_POST['address'];
            $description = $_POST['description'];
            $email= $_POST['email'];
            $telephone =$_POST['telephone'];
			$photo=$nextid;

//update data to vehicle  table
			$insertguide = "update vehicle set name='".$name."',address='".$address."',telephone='".$telephone."',email='".$email."',details='".$description."',photo='".$photo."' where vid='".$uid."'";
            $result2=$connection->query($insertguide);
			echo $insertguide ;
		    	
		    if($result2){
		    	$_GLOBAL['guidedone']=1;
		    }else{
		    	$_GLOBAL['guidedone']=0;
            }

//update in to account table
				$insertaccount = "update account set username='".$username."' where aid='".$aid."' ";
				$result=$connection->query($insertaccount);
				//echo $insertaccount;
				if($result){
					$_GLOBAL['accountdone']=1;
				}else{
					$_GLOBAL['accountdone']=0;
				}
                       

               if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['guidedone']==1) ){
                   echo "<script> alert('update is Sucessfull') </script>";
					header("Location: vehicle_home_page.php");
                }else{
                    //echo "failed";
					echo "<script> alert('update is Failed') </script>";
					
                }
        }        
?>
<?php require_once('vehicle_view_navigation.php')?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
		<div class="container">
        <form method="post" action="vehicle_update_profile.php" enctype="multipart/form-data">
           
		   <h2 class="title"><label>Update Profile</label></h2>
 <!--       <div class="row">
            <div class="col-25">
                <label>Vehicle ID:</label>
            </div>
            <div class="col-75">
                <input type="text" name="vid" value="<?php echo $vid?>"readonly>
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Type:</label>
            </div>
            <div class="col-75">
                <input type="text" name="type"  value="<?php echo $type?>" readonly>
            </div>
            </div>
-->			
			<div class="row">
            <div class="col-25">
                <label>Owner's Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>">
            </div>
            </div>
			
			
            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone" value="0<?php echo $telephone?>">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="description" value="<?php echo $details?>">
            </div>
            </div>

  
			<?php
				$path='../images/vehicle/';
				$ex='.jpg';
			?>
            <div class="row">
            <div class="col-25">
                <label>Image of the Vehicle:</label>
            </div>
            <div class="col-75">
                <?php echo "<img class='image' width='150px'  src='".$path.$photo.$ex."'>";?>
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
				<input type="submit" name="updatebtn" value="Update" class="formbtn"><br />
            </div>
		   
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>