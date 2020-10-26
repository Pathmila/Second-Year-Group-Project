<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
	$cat=$_SESSION['category'];
?>
<?php
    if(isset($_POST['submit'])){
		$category=$_POST['cat'];
		$sql="Delete from category where name='".$category."'"; 
		//echo $sql;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert(Delete) </script>";				
			//header("Location: admin_home_page.php");
        }  
	}
?>

<?php include('../../public/html/admin_deletecategory_page.html')?>
<?php require_once('footer.php')?>