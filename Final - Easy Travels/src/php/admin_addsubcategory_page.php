<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>

<?php
		if(isset($_POST['addsbucat'])){	
			//echo "Asini";
            $subcatname=$_POST['name'];
			$description=$_POST['description'];
   
			$check_name = check_name($connection, $subcatname);
   			if($check_name == 1){
				//insert subcategory details to the subcategory table
	            $sql="INSERT INTO subcategory(name,description) values ('".$subcatname."','".$description."')"; 
				//echo $sql2;
				$result2 = mysqli_query($connection,$sql);
	            if($result2){
					echo "<script> alert('Insert is Successful') </script>";				
					//header("Location: admin_home_page.php");
	            }else{
					echo "<script> alert('Insert is failed') </script>";
					//echo "failed";
					//header("Location: admin_home_page.php");
	            }
	        }else{
				//echo $check_name;
				echo "<script> alert('Name already used. Try with another name.') </script>";				
			} 
        }        
    ?>

<?php
	function check_name($connection, $subcatname){
		$sql1 = "select name from subcategory where name='".$subcatname."'";
		$result2 = mysqli_query($connection,$sql1);
		if($row2=$result2->fetch_assoc()){
			return 0;
		}else{
			return 1;
		} 
	}
?>

<?php include('../../public/html/admin_addsubcategory_page.html')?>
