<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
	$pack=$_SESSION['package'];
 ?>
 <?php
	$_GLOBAL['package']=0;
	$_GLOBAL['packdestination']=0;
	$_GLOBAL['categorysubcategory']=0;
    if(isset($_POST['submit'])){
		$pack=$_POST['name'];
		$sql1="select * from package where name='".$pack."'"; 
		$result1 = mysqli_query($connection,$sql1);
		$row=mysqli_fetch_assoc($result1);
		$packid=$row['packid'];
		$cate=$row['catname'];
		$subcate=$row['subcatname'];
		//echo $packid;
		
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
		
        if(($_GLOBAL['package']==1) && ($_GLOBAL['packdestination']==1) && ($_GLOBAL['categorysubcategory']==1)){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert('Delete is failed') </script>";				
			//header("Location: admin_home_page.php");
        }  
	}
?>
 
<?php include('../../public/html/admin_deletetravelpackage_page.html')?>
<?php require_once('footer.php')?>