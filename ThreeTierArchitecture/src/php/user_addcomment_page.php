<?php
    require_once('../../config/connect.php');
    session_start();
    $sql4="select max(photo3) from comment";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    $maxid=$max['max(photo3)'];
    $nextid=$maxid+1;
?>
<?php require_once('user_navigation.php')?> 


<?php
    if(isset($_POST['submit'])){
		$targetdir = '../../public/images/comment/';   
		$name1=$nextid;
		$name2=$nextid+1;
		$name3=$nextid+2;
		$ext=".jpg";
		$targetfile1 = $targetdir.$name1.$ext;
		$targetfile2 = $targetdir.$name2.$ext;
		$targetfile3 = $targetdir.$name3.$ext;
		if (move_uploaded_file($_FILES['file1']['tmp_name'], $targetfile1)) {
		}
		if (move_uploaded_file($_FILES['file2']['tmp_name'], $targetfile2)) {
		}
		if (move_uploaded_file($_FILES['file3']['tmp_name'], $targetfile3)) {
		}
    }        
?>

<?php
	if(isset($_POST['submit'])){
		$uid=$_SESSION['uid'];
		$description=$_POST['description'];
		$photo1=$nextid;
		$photo2=$nextid+1;
		$photo3=$nextid+2;
		$hotel=$_POST['hotel'];
		$rate=$_POST['rate'];
		$guide=$_POST['guide'];
		$rate2=$_POST['rate2'];
		$vehicle=$_POST['vehicle'];
		$rate3=$_POST['rate3'];
		
		$sql="insert into comment(uid,details,photo1,photo2,photo3,hotel,hotelrating,guide,guiderating,vehicle,vehiclerating)
		values('".$uid."','".$description."','".$photo1."','".$photo2."','".$photo3."',
		'".$hotel."','".$rate."','".$guide."','".$rate2."','".$vehicle."','".$rate3."')";
		echo $sql;
		$result=$connection->query($sql);
		if($result){	
            echo "<script> alert('Insert is Sucessfull') </script>";
			header("Location: user_home_page.php");
        }else{
            //echo "failed";
			echo "<script> alert('Insert is Failed') </script>";
			//header("Location: login_page.php");
        }
	}
?>

<?php include('../../public/html/user_addcomment_page.html')?>
<?php require_once('footer.php')?>