<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    
    $sql4="select max(catid) from category";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(catid)'];
    $nextid=$maxid+1;
?>
<?php
        if(isset($_POST['submit'])){
			$targetdir = '../../public/images/category/';   
			$name=$nextid;
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

			$filename=$nextid;

            $sql2="INSERT INTO category(name,photo) values ('".$catname."','".$filename."')"; 
			//echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
				echo "<script> alert('Insert is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
            }else{
				//echo "failed";
				header("Location: admin_home_page.php");
            }  
        }        
    ?>

<?php include('../../public/html/admin_addcategory_page.html')?>
<?php require_once('footer.php')?>



