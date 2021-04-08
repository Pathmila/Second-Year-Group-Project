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

	$subcategory=$_POST['selectedID'];
	//echo $category;
	$_SESSION['subcategory']=$subcategory;
	$sql = "SELECT * from subcategory where subcatid='".$subcategory."'"; 
	$result=mysqli_query($connection,$sql);	
    while($row=$result->fetch_assoc()){
    	$subcategoryname=(string)$row['name'];
    	$_SESSION['subcategoryname']=$subcategoryname;
		$description=(string)$row['description'];
    }
    //echo $subcategoryname;
	
?>

<?php
        if(isset($_POST['formsubmit'])){
			
            $subcatname=$_POST['name'];
			$ndetails=$_POST['ndetails'];
			$_SESSION['subcatname']=$subcatname;


            $sql2 = "UPDATE subcategory SET name ='".$subcatname."', description ='".$ndetails."' where subcatid='".$subcategory."'";  
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

<?php include('../../public/html/admin_view_subcategory_update.html')?>

