<?php require_once('guide_navigation.php')?> 
<?php 
    require_once('connect.php');
    session_start();
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
    }
	$sql2="select * from guideavailability where gid='".$uid."'";
	//echo $sql1;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $av=(string)$row2['availability'];
	}
?>

<?php
	if(isset($_POST['formsubmit'])){
		$availability=$_POST['availability'];
		$sql = "Update guideavailability set availability='".$availability."' where gid='".$uid."' ";
		//echo $sql;
		$result=$connection->query($sql);
		if($result){
			echo "<script> alert('Update is Sucessfull') </script>";
			header("Location: guide_home.php");
		}else{
			//echo "failed";
			echo "<script> alert('Update is Failed') </script>";
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
        <form method="post" action="guide_change_availability.php">
			<h2 class="title"><label>Change Your Availability</label></h2>

            <div class="row">
            <div class="col-25">
                
            </div>
            <div class="col-75">			
			<?php
				if($av=="1"){
					echo "<h3><INPUT type='radio' name='availability' Value='1' checked>&nbsp Yes</h3>";
					echo "<h3><INPUT type='radio' name='availability' Value='0'>&nbsp No</h3>";
				}else{
					echo "<h3><INPUT type='radio' name='availability' Value='1'>&nbsp Yes</h3>";
					echo "<h3><INPUT type='radio' name='availability' Value='0' checked>&nbsp No</h3>";
				}
			?>
                
            </div>
            </div>
			
			<div class="row">
                <input type="submit" name="formsubmit" value="Update" class="formbtn">
            </div>

            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>