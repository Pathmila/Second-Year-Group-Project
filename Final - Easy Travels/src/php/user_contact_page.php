<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?> 
<?php require_once('user_navigation.php')?> 

<?php	
    if(isset($_GET['Msubmit'])){
		//$id=1;
		$name=$_GET['name'];
		$email=$_GET['email'];
		$telephone=$_GET['telephone'];
		$details=$_GET['details'];
			   
		$insertmessage = "INSERT INTO messages (name,email,telephone,details) values ('".$name."','".$email."','".$telephone."','".$details."')";

		//echo $insertmessage;
		$result=$connection->query($insertmessage);
		//print_r($result);
		if($result){
			echo "<script> alert('Submition is Sucessfull') </script>";
		}else{
			echo "failed";
		}
    }
?>

 
<?php include('../../public/html/contact_page.html')?>
<?php require_once('footer_user.php')?>

