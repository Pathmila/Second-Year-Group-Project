<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>

<?php
        if(isset($_POST['formsubmit'])){
			
            $subcatname=$_POST['name'];
			$ndetails=$_POST['ndetails'];
			$subcategoryname=$_SESSION['subcategoryname'];
			//echo $subcategoryname;

            $sql2 = "UPDATE subcategory SET name ='".$subcatname."', description ='".$ndetails."' where name='".$subcategoryname."'";  
			//echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
				echo "<script> alert('Update is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
            }else{
				//echo "failed";
				//header("Location: admin_home_page.php");
            }  
        }        
    ?>


