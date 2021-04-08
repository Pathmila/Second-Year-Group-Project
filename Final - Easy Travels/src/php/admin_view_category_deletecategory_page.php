<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
	
?>
<?php

	$_GLOBAL['category']=0;
	$_GLOBAL['categorysubcategory']=0;
	$_GLOBAL['package']=0;
	$_GLOBAL['packdestination']=0;
	$_GLOBAL['resavation']=0;
	
    if(isset($_POST['submit'])){
		//$category=$_POST['cat'];
		$category=$_SESSION['categoryname'];
		$sql1="select * from category where name='".$category."'"; 
		//echo $sql;
		$result1 = mysqli_query($connection,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		$catid=$row1['catid'];
		$photo=$row1['photo'];
		//echo $catid;
		
		$number=0;
		$sql13="select * from package where catname='".$category."'";
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
		

		//echo $_GLOBAL['resavation'];

		//No reservation
		if(($_GLOBAL['resavation']==1)){

			//File deletion part start
				$targetdir = '../../public/images/category/';   
				$name=$photo;
				$ext=".jpg";
				$targetfile = $targetdir.$name.$ext;

				// Use unlink() function to delete a file 
				if (!unlink($targetfile)) { 
					//echo ("$targetfile cannot be deleted due to an error"); 
				} 
				else { 
					//echo ("$targetfile has been deleted"); 
				} 
			//File deletion part ends 

			$sql="Delete from category where name='".$category."'"; 
			//echo $sql;
			$result = mysqli_query($connection,$sql);
	        if($result){
				$_GLOBAL['category']=1;
			}else{
				$_GLOBAL['category']=0;
			}

			$sql3="select * from package where catname='".$category."'";
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
				
				$sql2="Delete from categorysubcategory where catid='".$catid."'"; 
				echo $sql2;
				$result2 = mysqli_query($connection,$sql2);
		        if($result2){
					$_GLOBAL['categorysubcategory']=1;
				}else{
					$_GLOBAL['categorysubcategory']=0;
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
			if( (($_GLOBAL['category']==1) && ($_GLOBAL['categorysubcategory']==1) && ($_GLOBAL['package']==1) && 
				($_GLOBAL['packdestination']==1)) || ($_GLOBAL['category']==1) ){
				//echo "<script> confirm() </script>";				
				echo "<script> alert('Delete is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
		    }else{
				//echo "failed";
				echo "<script> alert(Delete is failed.) </script>";				
				//header("Location: admin_home_page.php");
		    }
		}else if(($_GLOBAL['category']==1) && ($_GLOBAL['resavation']==1)){
			//File deletion part start
				$targetdir = '../../public/images/category/';   
				$name=$photo;
				$ext=".jpg";
				$targetfile = $targetdir.$name.$ext;

				// Use unlink() function to delete a file 
				if (!unlink($targetfile)) { 
					//echo ("$targetfile cannot be deleted due to an error"); 
				} 
				else { 
					//echo ("$targetfile has been deleted"); 
				} 
			//File deletion part ends 

			$sql="Delete from category where name='".$category."'"; 
			//echo $sql;
			$result = mysqli_query($connection,$sql);
	        if($result){
				echo "<script> alert('Delete is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
			}else{
				echo "<script> alert(Delete is failed.) </script>";				
			}

		}else{
			//echo "failed";
			echo "<script> alert('Your have reservations. You have assign them before deletion.') </script>";	
		}
		
	}
?>

<?php include('../../public/html/admin_view_category_deletecategory_page.html')?>
