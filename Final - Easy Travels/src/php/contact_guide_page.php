<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=2){
        header('Location: login_page.php');
    }
?>
<?php require_once('guide_navigation.php')?> 

<?php	
    if(isset($_GET['submit'])){
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
            echo "<script> alert('Submission is Sucessful') </script>";
		}else{
            echo "failed";
        }
    }
?>
		
<?php include('../../public/html/contact_guide.html')?>
<?php require_once('guide_footer.php')?>

