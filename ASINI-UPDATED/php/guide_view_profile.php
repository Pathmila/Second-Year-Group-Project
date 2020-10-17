<?php require_once('connect.php');?>
<?php require_once('guide_navigation.php')?> 
<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
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
	$sql2="select * from guideavailability where gid='".$uid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $av=(string)$row2['availability'];
		//echo $av;
		if($av=="1"){
			$avail="Yes";
		}else if($av == "0"){
			$avail="No";
		}else{
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
        <form method="GET" action="guide_view_profile.php">
			<h2 align='center' class="title"><label>View Profile</label></h2>
			
			<?php
				$path='../images/guide/';
				$ex='.jpg';
			?>

            <div class="row">
                <?php echo "<p align='center'><img class='image' width='250px'  src='".$path.$photo1.$ex."'></p>";?>
            </div>
			
            <div class="row">
            <div class="col-25">
                <label>Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?php echo $name?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Username:</label>
            </div>
            <div class="col-75">
                <input type="text" name="uname" value="<?php echo $uname?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Birthday:</label>
            </div>
            <div class="col-75">
                <input type="text" name="age" value="<?php echo $dob?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" value="<?php echo $address?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Email:</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" value="<?php echo $email?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Telephone:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="telephone" value="0<?php echo $telephone?>" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <input type="tel" name="description" value="<?php echo $description?>"  readonly>
            </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Guide Availability:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="availbility" value=<?php echo $avail?> readonly>
                </div>
            </div>

           
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>
