<?php require_once('connect.php');?>
<?php require_once('guide_navigation.php')?> 
<?php 
    require_once('connect.php');
    session_start();
    $sql4="select max(gid) from guide";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(gid)'];
    $nextid=$maxid+1;
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
?>
<?php
	
	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
		$uname=(string)$row['username'];
    }
	
	$sql1="select * from guide where gid='".$uid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){
        $name=(string)$row1['name'];
		$dob=(string)$row1['birthday'];
		$address=(string)$row1['address'];
		$telephone=(string)$row1['telephone'];
		$email=(string)$row1['email'];
		$description=(string)$row1['description'];
		$photo1=(string)$row1['photo'];
		//echo $photo1;
    }
	
?>
<?php
        if(isset($_POST['updatebtn'])){
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

        if(isset($_POST['updatebtn'])){
			$name=$_POST['name'];
			$username=$_POST['uname'];
            $address=$_POST['address'];
            $birthday=$_POST['birthday'];
            $description = $_POST['description'];
            $email= $_POST['email'];
            $telephone =$_POST['telephone'];

			$photo=$nextid;

//update data to guide  table
			$insertguide = "update guide set name='".$name."', birthday='".$birthday."',address='".$address."',telephone='".$telephone."',email='".$email."',description='".$description."',photo='".$photo."' where gid='".$uid."'";
            $result2=$connection->query($insertguide);
			//echo $insertguide ;
		    	
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
					header("Location: guide_view_profile.php");
                }else{
                    //echo "failed";
					echo "<script> alert('Registration is Failed') </script>";
					
                }
        }        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
        <?php require_once('guide_view_navigation.php')?>
		<div class="container">
        <form method="post" action="guide_update_profile.php" enctype="multipart/form-data">
			<h2 class="title"><label>Update Profile</label></h2>
            <div class="row">
            <div class="col-25">
                <label>Name:</label>
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
                <input type="text" name="uname" value="<?php echo $uname?>">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Birthday:</label>
            </div>
            <div class="col-75">
				<input name="birthday" id="birthday" type="date" value="<?php echo $dob?>" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>">
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
                <input type="tel" name="description" value="<?php echo $description?>">
            </div>
            </div>

            

			<?php
				$path='../images/guide/';
				$ex='.jpg';
			?>

            <div class="row">
            <div class="col-25">
                <label>Guide Image:</label>
            </div>
            <div class="col-75">
                <?php echo "<img class='image' width='150px'  src='".$path.$photo1.$ex."'>";?>
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
