<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start(); 
    $sql4="select max(photo3) from package";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo3)'];
    $nextid=$maxid+1;	
	
	$sql5="select max(packid) from package";
    $result5=mysqli_query($connection,$sql5);
    $pack=mysqli_fetch_assoc($result5);
	$packid=$pack['max(packid)'];
	$nextpack=$packid+1;
	//echo $nextpack;
?>
<?php
		
        if(isset($_POST['submit'])){
			$targetdir = '../../public/images/package/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			$targetdir = '../../public/images/package/';   
			$name=$nextid+1;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image1']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			$targetdir = '../../public/images/package/';   
			$name=$nextid+2;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;
			
			if (move_uploaded_file($_FILES['file3']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
		}
?>

<?php
	$_GLOBAL['package']=0;
	$_GLOBAL['categorysubcategory']=0;
	
	if(isset($_POST['submit'])){
		$catname=$_POST['cat'];
		$subcatname=$_POST['subcat'];
		$name=$_POST['name'];
		$days=$_POST['number'];
		$price=$_POST['price'];
		$details=$_POST['details'];
		$image=$nextid;
		$image2=$nextid+1;
		$image3=$nextid+2;

		//The travel package inserting part
		$sql2="INSERT INTO package(packid,catname,subcatname,name,days,price,details,photo1,photo2,photo3) values 
			('".$nextpack."','".$catname."','".$subcatname."','".$name."','".$days."','".$price."','".$details."','".$image."','".$image2."','".$image3."')"; 
		//echo $sql2;
		$result2 = mysqli_query($connection,$sql2);
		if($result2){
			$_GLOBAL['package']=1;
		}else{
			$_GLOBAL['package']=0;
		}
		
		//selecting the category id		
		$sql11="select * from category where name='".$catname."'"; 
		//echo $sql;
		$result11 = mysqli_query($connection,$sql11);
		$row11=mysqli_fetch_assoc($result11);
		$catid=$row11['catid'];
		
		//selecting the subcategory id
		$sql12="select * from subcategory where name='".$subcatname."'"; 
		//echo $sql;
		$result12 = mysqli_query($connection,$sql12);
		$row12=mysqli_fetch_assoc($result12);
		$subcatid=$row12['subcatid'];
		
		//Inserting categorysubcategory table.
		$sql10="insert into categorysubcategory(catid,subcatid) values ('".$catid."','".$subcatid."')";
		$result10= mysqli_query($connection,$sql10);
		//echo $sql10;
		if($result10){
			$_GLOBAL['categorysubcategory']=1;
		}else{
			$_GLOBAL['categorysubcategory']=0;
		}
		
		if($_POST['destination1'] != 'null'){
			$d1=$_POST['destination1'];
			$sql3="INSERT INTO packdestination(packid,destid) values('".$nextpack."','".$d1."')"; 
			//echo $sql3;
			$result3 = mysqli_query($connection,$sql3);
		}
		
		if($_POST['destination2'] != 'null'){
			$d2=$_POST['destination2'];
			$sql6="INSERT INTO packdestination(packid,destid) values('".$nextpack."','".$d2."')"; 
			//echo $sql6;
			$result6 = mysqli_query($connection,$sql6);
		}
		
		if($_POST['destination3'] != 'null'){
			$d3=$_POST['destination3'];
			$sql7="INSERT INTO packdestination(packid,destid) values('".$nextpack."','".$d3."')"; 
			//echo $sql7;
			$result7 = mysqli_query($connection,$sql7);
		}
		
		if($_POST['destination4'] != 'null'){
			$d4=$_POST['destination4'];
			$sql8="INSERT INTO packdestination(packid,destid) values('".$nextpack."','".$d4."')"; 
			//echo $sql8;
			$result8 = mysqli_query($connection,$sql8);
		}
		
		if($_POST['destination5'] != 'null'){
			$d5=$_POST['destination5'];
			$sql9="INSERT INTO packdestination(packid,destid) values('".$nextpack."','".$d5."')"; 
			//echo $sql9;
			$result9 = mysqli_query($connection,$sql9);
		}
	
		if(($_GLOBAL['package']==1) && ($_GLOBAL['categorysubcategory']==1) && ( $result3 || $result6 || result7 || result8 || result9 )){
			echo "<script> alert('Insert is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
		}else{
			//echo "failed";
			header("Location: admin_home_page.php");
		} 
	}
?>
<?php include('../../public/html/admin_addtravelpackage_page.html')?>
<?php require_once('footer.php')?>