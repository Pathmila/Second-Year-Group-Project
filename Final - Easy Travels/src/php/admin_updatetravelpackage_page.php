<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
	
	$pack=$_SESSION['package'];
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
		$_SESSION['photo1']=$photo1;
		$_SESSION['photo2']=$photo2;
		$_SESSION['photo3']=$photo3;
	}
?>
<?php
	$path='../../public/images/package/';
	$ex='.jpg';
?>
<?php
		$_SESSION['photo1']=$photo1;
		$_SESSION['photo2']=$photo2;
		$_SESSION['photo3']=$photo3;

        if(isset($_POST['btnupdate'])){

			$targetdir = '../../public/images/package/';   
			$name1=$photo1;
			$name2=$photo2;
			$name3=$photo3;
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
			//echo $_SESSION['package'];
			//echo "asini";
			$newdays=$_POST['days'];
			$newprice=$_POST['price'];
			$newdetails=$_POST['details'];
			
			if($newname == $_SESSION['package']){
				$check_name = 1;
			}else{
				$check_name = check_name($connection, $newname);
			}
			
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

<?php include('../../public/html/admin_updatetravelpackage_page.html')?>


