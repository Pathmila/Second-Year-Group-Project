<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

 <?php
    if(isset($_POST['submit'])){
		$id=$_POST['id'];
		//echo $id;
		$sql="Delete from messages where id='".$id."'"; 
		//echo $sql;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert('Delete is failed') </script>";				
			//header("Location: admin_home_page.php");
        }  
	}
?>

<?php include('../../public/html/admin_view_report_general5.html')?>
<?php require_once('footer.php')?>


