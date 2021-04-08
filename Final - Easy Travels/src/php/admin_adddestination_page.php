<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
    
    $sql4="select max(photo) from destination";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo)'];
    $nextid=$maxid+1;
?>

<?php
        if(isset($_POST['submit'])){
			//insert the image of the destination
			$targetdir = '../../public/images/destination/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			//echo "Asini";
            $dname=$_POST['name'];
            //$file=$_POST['image'];
            //echo $file;
            //$cat=$_POST['cat'];
			$destination=$_POST['subject'];
			$filename=$nextid;

			$check_name = check_name($connection, $dname);
			if($check_name == 1){
				//inserting destination details to the destination table
	            $sql2="INSERT INTO destination(name,description,photo) values ('".$dname."','".$destination."','".$filename."')"; 
				//echo $sql2;
				$result2 = mysqli_query($connection,$sql2);
	            if($result2){
					echo "<script> alert('Insert is Successful') </script>";				
					//header("Location: admin_home_page.php");
	            }else{
					//echo "failed";
					//header("Location: admin_home_page.php");
					echo "<script> alert('Insert is failed') </script>";				
	            }  
	        }else{
				//echo $check_name;
				echo "<script> alert('Name already used. Try with another name.') </script>";				
			}
        }        
    ?>
<?php
	function check_name($connection, $dname){
		$sql1 = "select name from destination where name='".$dname."'";
		$result2 = mysqli_query($connection,$sql1);
		if($row2=$result2->fetch_assoc()){
			return 0;
		}else{
			return 1;
		} 
	}
?>	

<?php include('../../public/html/admin_adddestination_page.html')?>
