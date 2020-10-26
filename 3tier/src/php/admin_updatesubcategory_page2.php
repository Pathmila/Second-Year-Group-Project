<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('connect.php');
    session_start();
?>
<?php
	$path='../images/category/';
	$ex='.jpg';
	$subcategory=$_SESSION['subcategory'];
	//echo $category;
	//$_SESSION['category']=$category;
	$sql = "SELECT * from subcategory where name='".$subcategory."'"; 
	$result=mysqli_query($connection,$sql);	
    while($row=$result->fetch_assoc()){
		$description=(string)$row['description'];
    }
	
?>

<?php
        if(isset($_POST['formsubmit'])){
			
            $subcatname=$_POST['name'];
			$ndetails=$_POST['ndetails'];
			$_SESSION['subcatname']=$subcatname;


            $sql2 = "UPDATE subcategory SET name ='".$subcatname."', description ='".$ndetails."' where name='".$subcategory."'";  
			echo $sql2;
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

<?php include('../../public/html/admin_updatesubcategory_page2.html')?>
<?php require_once('footer.php')?>
