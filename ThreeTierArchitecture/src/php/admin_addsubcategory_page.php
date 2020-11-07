<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
?>

<?php
		if(isset($_POST['addsbucat'])){	
			//echo "Asini";
            $subcatname=$_POST['name'];
			$description=$_POST['description'];
   
			//insert subcategory details to the subcategory table
            $sql="INSERT INTO subcategory(name,description) values ('".$subcatname."','".$description."')"; 
			//echo $sql2;
			$result2 = mysqli_query($connection,$sql);
            if($result2){
				echo "<script> alert('Insert is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
            }else{
				//echo "failed";
				//header("Location: admin_home_page.php");
            }  
        }        
    ?>

<?php include('../../public/html/admin_addsubcategory_page.html')?>
<?php require_once('footer.php')?>