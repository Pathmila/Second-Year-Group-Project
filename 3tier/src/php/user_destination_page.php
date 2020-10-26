<?php 
	require_once('connect.php');
	session_start();

?>
<?php require_once('user_navigation.php')?> 

<?php
            if(isset($_GET['dropsubmit'])){
				$_SESSION['dname']=$_GET['destination'];
				//echo $_SESSION['dname'];
                header("Location: user_search_destination_page.php");
            }
		?>

<?php  
            if(isset($_GET['viewsubmit'])){
				$_SESSION['dname']=$_GET['destname'];
                header("Location: user_search_destination_page.php");
            }
		?>

<?php include('../../public/html/user_destination_page.html')?>
<?php require_once('footer.php')?>