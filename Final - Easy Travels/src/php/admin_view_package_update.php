<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
	$sql4="select max(photo3) from package";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo3)'];
    $nextphoto=$maxid+1;

	$pack=$_POST['selectedID'];
	$_SESSION['package']=$pack;
	$sql="select * from package where name = '".$pack."'";
	$result = mysqli_query($connection,$sql);
	//echo $sql;
	while($row=$result->fetch_assoc()){
		$id=$row['packid'];
		$cat=$row['catname'];
		$subcat=$row['subcatname'];
		$name=$row['name'];
		$days=$row['days'];
		$price=$row['price'];
		$details=$row['details'];
		$photo1=$row['photo1'];
		$photo2=$row['photo2'];
		$photo3=$row['photo3'];
	}
?>
<?php
	$path='../../public/images/package/';
	$ex='.jpg';
?>
<?php
        if(isset($_POST['btnupdate'])){

			$targetdir = '../../public/images/package/';   
			$name1=$nextphoto;
			$name2=$nextphoto+1;
			$name3=$nextphoto+2;
			$ext=".jpg";
			$targetfile1 = $targetdir.$name1.$ext;
			$targetfile2 = $targetdir.$name2.$ext;
			$targetfile3 = $targetdir.$name3.$ext;

			if (move_uploaded_file($_FILES['file1']['tmp_name'], $targetfile1)) {			
				//echo "Done";
			} 
			if (move_uploaded_file($_FILES['file2']['tmp_name'], $targetfile2)) {			
				//echo "Done";
			} 
			if (move_uploaded_file($_FILES['file3']['tmp_name'], $targetfile3)) {			
				//echo "Done";
			} 
			
			$newname=$_POST['nname'];
			//echo $newname;
			$newdays=$_POST['days'];
			$newprice=$_POST['price'];
			$newdetails=$_POST['details'];
			$photo1=$nextphoto;
			$photo2=$nextphoto+1;
			$photo3=$nextphoto+2;
			
			$check_name = check_name($connection, $newname);
			
			if($check_name == 1){
				if($newname != ""){
					$sql2 = "UPDATE package SET name ='".$newname."',days='".$newdays."' , price ='".$newprice."',details='".$newdetails."', photo1='".$photo1."', photo2='".$photo2."', photo3='".$photo3."'  where packid='".$id."'";  
					//echo $sql2;
					$result2 = mysqli_query($connection,$sql2);
				}else{			
					$sql3 = "UPDATE package SET days='".$newdays."' , price ='".$newprice."',details='".$newdetails."', photo1='".$photo1."', photo2='".$photo2."', photo3='".$photo3."'  where packid='".$id."'";  
					//echo $sql3;
					$result3 = mysqli_query($connection,$sql3);
				}
				
				if($result2){
					echo "<script> alert('Update is Sucessfull') </script>";				
					header("Location: admin_home_page.php");
				}else{
					echo "<script> alert('Update is Failed') </script>";				
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
	function check_name($connection, $name){
		$sql20 = "select name from package where name='".$name."'";
		$result20 = mysqli_query($connection,$sql20);
		if($row20=$result20->fetch_assoc()){
			return 0;
		}else{
			return 1;
		} 
	}
?>

<?php include('../../public/html/admin_view_package_update.html')?>


