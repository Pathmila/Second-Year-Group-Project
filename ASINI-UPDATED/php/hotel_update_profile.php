<?php require_once('hotel_navigation.php')?> 

<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(hid) from hotel";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(hid)'];
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
    }
	
	$sql1="select * from hotel where hid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=$row1['name'];
		$email=$row1['email'];
		$address=$row1['address'];
		$telephone=$row1['telephone'];
		$photo=$row1['photo'];
		$description=$row1['description'];
		$singlerooms=$row1['singlerooms'];
		$singleroomprice=$row1['singleroomprice'];
		$doublerooms=$row1['doublerooms'];
		$doubleroomprice=$row1['doubleroomprice'];
		$familyrooms=$row1['familyrooms'];
		$familyroomprice=$row1['familyroomprice'];		
    }
	
?>
<?php
        if(isset($_POST['updatebtn'])){
			$targetdir = '../images/hotel/';   
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
			$srooms=$_POST['srooms'];
			$sroomprice=$_POST['sprice'];
			$drooms=$_POST['drooms'];
			$droomprice=$_POST['dprice'];
			$frooms=$_POST['frooms'];
			$froomprice=$_POST['fprice'];
			$photo=$nextid;

//update data to guide  table
			$insertguide = "update hotel set name='".$name."',address='".$address."',telephone='".$telephone."',
			email='".$email."',description='".$description."',photo='".$photo."',singleroomprice='".$sroomprice."',
			singlerooms='".$srooms."',doubleroomprice='".$droomprice."',doublerooms='".$drooms."',familyroomprice='".$froomprice."',
			familyrooms='".$frooms."' where hid='".$uid."'";
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
                   echo "<script> alert('Registration is Sucessfull') </script>";
					header("Location: hotel_home_page.php");
                }else{
                    //echo "failed";
					echo "<script> alert('Registration is Failed') </script>";
					
                }
        }        
?>
<?php require_once('hotel_view_navigation.php')?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>
		<div class="container">
        <form method="post" action="hotel_update_profile.php" enctype="multipart/form-data">
            
			<h2 class="title"><label>Update Profile</label></h2>
			
			<div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input name="name" id="name" type="text" value="<?php echo $name?>">
            </div>
            </div>		
			
			<div class="row">
            <div class="col-25">
                <label>User Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>">
            </div>
            </div>	
			
			<div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input name="address" id="address" type="text" value="<?php echo $address?>">
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">             
				<input name="email" id="email" placeholder="Enter Email" type="email" value="<?php echo $email?>" >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Telephone No:</label>
            </div>
            <div class="col-75">
				<input name="telephone" id="telephone" placeholder="Enter Telephone" type="tel" pattern="[0-9]{10}" value="0<?php echo $telephone?>">
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Details:</label>
            </div>
            <div class="col-75">
                <input type="text" name="description" value="<?php echo $description?>">
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
				<input name="srooms" id="srooms" type="number" min="0" max="800" step="1" value="<?php echo $singlerooms?>" >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a single room</label>
            </div>
            <div class="col-75">
                <input name="sprice" id="sprice" type="text" value="<?php echo $singleroomprice?>" >
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
				<input name="drooms" id="drooms" type="number" min="0" max="800" step="1" value="<?php echo $doublerooms?>" >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a double room</label>
            </div>
            <div class="col-75">
                <input name="dprice" id="dprice" type="text" value="<?php echo $doubleroomprice?>" >
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
				<input name="frooms" id="frooms" type="number" min="0" max="800" step="1" value="<?php echo $familyrooms?>" >
            </div>
            </div>
			
			<div class="row">
            <div class="col-25">
                <label>Price of a family room</label>
            </div>
            <div class="col-75">
                <input name="fprice" id="fprice" type="text" value="<?php echo $familyroomprice?>" >
            </div>
            </div>
			
			<?php
				$path='../images/hotel/';
				$ex='.jpg';
			?>
			<div class="row">
            <div class="col-25">
                <label for="lname">Photo</label>
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