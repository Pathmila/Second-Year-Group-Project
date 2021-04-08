<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
	$pack=$_SESSION['package'];
 ?>
 <?php
	$_GLOBAL['package']=0;
	$_GLOBAL['packdestination']=0;
	$_GLOBAL['categorysubcategory']=0;
	$_GLOBAL['resavation']=0;

    if(isset($_POST['submit'])){
		$pack=$_POST['name'];
		$sql1="select * from package where name='".$pack."'"; 
		$result1 = mysqli_query($connection,$sql1);
		$row=mysqli_fetch_assoc($result1);
		$packid=$row['packid'];
		$cate=$row['catname'];
		$subcate=$row['subcatname'];
		$photo1=$row['photo1'];
		$photo2=$row['photo2'];
		$photo3=$row['photo3'];
		echo $photo1;

		$number=0;
		$sql13="select * from package where name='".$pack."'";
		$result13 = mysqli_query($connection,$sql13);
        while($row13=$result13->fetch_assoc()){
			$packid1=$row13['packid'];
				
			$sql6="select * from resavation where packid='".$packid1."'"; 
			//echo $sql6;
			$result6 = mysqli_query($connection,$sql6);
			$number = mysqli_num_rows($result6);
		}
		if($number == '0'){
			$_GLOBAL['resavation']=1;
		}else{
			$_GLOBAL['resavation']=0;
		}

		if(($_GLOBAL['resavation']==1)){

	//File deletion part start
			$targetdir = '../../public/images/package/';   
			$name1=$photo1;
			$ext=".jpg";
			$targetfile1 = $targetdir.$name1.$ext;

			// Use unlink() function to delete a file 
			if (!unlink($targetfile1)) { 
				//echo ("$targetfile cannot be deleted due to an error"); 
			} 
			else { 
				//echo ("$targetfile has been deleted"); 
			} 

			$targetdir = '../../public/images/package/';   
			$name2=$photo2;
			$ext=".jpg";
			$targetfile2 = $targetdir.$name2.$ext;

			// Use unlink() function to delete a file 
			if (!unlink($targetfile2)) { 
				//echo ("$targetfile cannot be deleted due to an error"); 
			} 
			else { 
				//echo ("$targetfile has been deleted"); 
			} 

			$targetdir = '../../public/images/package/';   
			$name3=$photo3;
			$ext=".jpg";
			$targetfile3 = $targetdir.$name3.$ext;

			// Use unlink() function to delete a file 
			if (!unlink($targetfile3)) { 
				//echo ("$targetfile cannot be deleted due to an error"); 
			} 
			else { 
				//echo ("$targetfile has been deleted"); 
			} 
	//File deletion part ends 
			
			$sql4="select * from subcategory where name='".$subcate."'"; 
			//echo $sql;
			$result4 = mysqli_query($connection,$sql4);
			$row4=mysqli_fetch_assoc($result4);
			$subcatid=$row4['subcatid'];
			//echo $catid;
			
			$sql5="select * from category where name='".$cate."'"; 
			//echo $sql;
			$result5 = mysqli_query($connection,$sql5);
			$row5=mysqli_fetch_assoc($result5);
			$catid=$row5['catid'];
			
			$sql2="Delete from categorysubcategory where subcatid='".$subcatid."'  and catid='".$catid."'"; 
			echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
	        if($result2){
				$_GLOBAL['categorysubcategory']=1;
			}else{
				$_GLOBAL['categorysubcategory']=0;
			}
			
			$sql="Delete from package where name='".$pack."'"; 
			//echo $sql;
			$result2 = mysqli_query($connection,$sql);
			if($result2){
				$_GLOBAL['package']=1;
			}else{
				$_GLOBAL['package']=0;
			}
		
			$sql3="Delete from packdestination where packid='".$packid."'"; 
			//echo $sql;
			$result3 = mysqli_query($connection,$sql3);
			if($result3){
				$_GLOBAL['packdestination']=1;
			}else{
				$_GLOBAL['packdestination']=0;
			}
			
	        if(($_GLOBAL['package']==1) && ($_GLOBAL['packdestination']==1) && ($_GLOBAL['categorysubcategory']==1) ){
				//echo "<script> confirm() </script>";				
				echo "<script> alert('Delete is Sucessfull') </script>";				
				//echo asini
				header("Location: admin_home_page.php");
	        }else{
				//echo "failed";
				echo "<script> alert('Delete is failed') </script>";				
				//header("Location: admin_home_page.php");
	        }  
		}else{
			//echo "failed";
			echo "<script> alert('Your have reservations. You have assign them before deletion.') </script>";	
		}
	}
?>
 
<?php include('../../public/html/admin_view_package_deletetravelpackage_page.html')?>
