<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
    
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
			//inserting category image 
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

			$check_name = check_name($connection, $catname);
			if($check_name == 1){
				//echo $check_name;
				//insert category deatails to the category table
	            $sql2="INSERT INTO category(name,photo) values ('".$catname."','".$filename."')"; 
				//echo $sql2;
				$result2 = mysqli_query($connection,$sql2);
	            if($result2){
					echo "<script> alert('Insert is Successful') </script>";				
					//header("Location: admin_home_page.php");
	            }else{
					//echo "failed";
					echo "<script> alert('Insert is failed') </script>";				
	            }
			}else{
				//echo $check_name;
				echo "<script> alert('Name already used. Try with another name.') </script>";				
			}
        }        
?>

<?php
	function check_name($connection, $catname){
		$sql1 = "select name from category where name='".$catname."'";
		$result2 = mysqli_query($connection,$sql1);
		if($row2=$result2->fetch_assoc()){
			return 0;
		}else{
			return 1;
		} 
	}
?>

<?php include('../../public/html/admin_addcategory_page.html')?>




