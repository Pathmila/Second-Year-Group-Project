<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
	$subcat=$_SESSION['subcategory'];
	//echo $subcat;
 ?>
 <?php	
	$_GLOBAL['subcategory']=0;
	$_GLOBAL['categorysubcategory']=0;
	$_GLOBAL['package']=0;
	$_GLOBAL['packdestination']=0;
	if(isset($_POST['submit'])){
		$subcategory=$_POST['subcat'];
		$sql1="select * from subcategory where name='".$subcategory."'"; 
		//echo $sql;
		$result1 = mysqli_query($connection,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		$subcatid=$row1['subcatid'];
		//echo $catid;
		
		$sql="Delete from subcategory where name='".$subcategory."'"; 
		//echo $sql;
		$result = mysqli_query($connection,$sql);
        if($result){
			$_GLOBAL['subcategory']=1;
		}else{
			$_GLOBAL['subcategory']=0;
		}
		
		$sql2="Delete from categorysubcategory where subcatid='".$subcatid."'"; 
		//echo $sql2;
		$result2 = mysqli_query($connection,$sql2);
        if($result2){
			$_GLOBAL['categorysubcategory']=1;
		}else{
			$_GLOBAL['categorysubcategory']=0;
		}
		
		$sql3="select * from package where subcatname='".$subcategory."'";
		$result3 = mysqli_query($connection,$sql3);
        while($row3=$result3->fetch_assoc()){
			$packid=$row3['packid'];
			
			$sql4="delete from package where packid='".$packid."'";
			$result4=mysqli_query($connection,$sql4);
			//echo $sql4;
			if($result4){
				$_GLOBAL['package']=1;
			}else{
				$_GLOBAL['package']=0;
			}
			
			$sql5="delete from packdestination where packid='".$packid."'";
			$result5=mysqli_query($connection,$sql5);
			//echo $sql5;
			if($result5){
				$_GLOBAL['packdestination']=1;
			}else{
				$_GLOBAL['packdestination']=0;
			}
			
		}
		
		if(($_GLOBAL['subcategory']==1) && ($_GLOBAL['categorysubcategory']==1) && ($_GLOBAL['package']==1) && ($_GLOBAL['packdestination']==1)){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert(Delete) </script>";				
			//header("Location: admin_home_page.php");
        }  
	}
?>
<?php include('../../public/html/admin_deletesubcategory_page.html')?>
<?php require_once('footer.php')?>