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
		$path='../../public/images/category/';
		$ex='.jpg';

		$category=$_SESSION['category'];
		//echo $category;
		$sql = "SELECT * from category where catid='".$category."'"; 
		$result=mysqli_query($connection,$sql);	
	    while($row=$result->fetch_assoc()){
	        $photo=(string)$row['photo'];
			$catid=(string)$row['catid'];
			//echo $catid;
	    }


		$targetdir = '../../public/images/category/';   
		$name=$category;
		$ext=".jpg";
		$targetfile = $targetdir.$name.$ext;

		if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
			//echo "Done";
		} else { 
			//echo "Not uploaded";
			
		}
			
		//echo "Asini";
        $catname=$_POST['name'];
        //$file=$_POST['image'];
        //echo $file;
        //$cat=$_POST['cat'];
		$filename=$category;

        $sql2 = "UPDATE category SET name ='".$catname."', photo ='".$category."' where catid='".$category."'";  
		//echo $sql2;
		$result2 = mysqli_query($connection,$sql2);
        if($result2){
			echo "<script> alert('Update is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			echo "<script> alert('Update is Failed') </script>";				
			//echo "failed";
			//header("Location: admin_home_page.php");
        }  
    }        
?>



