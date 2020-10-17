<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php 
    require_once('connect.php');
    session_start();
	$sql4="select max(photo3) from package";
    $result4=mysqli_query($connection,$sql4);
    $max=mysqli_fetch_assoc($result4);
    //echo $max;
    //print_r ($max);
    $maxid=$max['max(photo3)'];
    $nextphoto=$maxid+1;

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
	}
?>

<?php
        if(isset($_POST['btnupdate'])){
			$targetdir = '../images/package/';   
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
			
			if($newname != ""){
				$sql2 = "UPDATE package SET name ='".$newname."',days='".$newdays."' , price ='".$newprice."',details='".$newdetails."', photo1='".$photo1."', photo2='".$photo2."', photo3='".$photo3."'  where packid='".$id."'";  
				//echo $sql2;
				$result2 = mysqli_query($connection,$sql2);
			}else{			
				$sql3 = "UPDATE package SET days='".$newdays."' , price ='".$newprice."',details='".$newdetails."', photo1='".$photo1."', photo2='".$photo2."', photo3='".$photo3."'  where packid='".$id."'";  
				//echo $sql3;
				$result3 = mysqli_query($connection,$sql3);
			}
			
		/*	if($result2){
				echo "<script> alert('Update is Sucessfull') </script>";				
				header("Location: admin_home_page.php");
			}else{
				//echo "failed";
				header("Location: admin_home_page.php");
			}  
		*/
		}
?>

<html>
    <head>
        <title>EasyTravels.com</title>    
        <meata name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS TO CSS AND JS --->
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
	<body>
		<div class="container">
			<form method="post" action="admin_deletetravelpackage_page.php" enctype="multipart/form-data">
				<h2 class="title"><label><?php echo $pack;?>&nbsp&nbsp-&nbsp&nbsp Update Travel Package</label></h2>
				<div class="row">
				<div class="col-25">
					<label for="fname">Category Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="cat" value="<?php echo $cat?>" readonly>
				</div>
				</div>
				
				<div class="row">
				<div class="col-25">
					<label for="fname">Subcategory Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="subcat" value="<?php echo $subcat?>" readonly>
				</div>
				</div>

				<div class="row">
				<div class="col-25">
					<label for="fname">Package Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="name" value="<?php echo $pack?>" readonly>
				</div>
				</div>
				
				<div class="row">
				<div class="col-25">
					<label for="fname">No of Days</label>
				</div>
				<div class="col-75">
					<input type="text" name="days" value="<?php echo $days?>" readonly>
				</div>
				</div>
						
				<div class="row">
				<div class="col-25">
					<label for="fname">Package Price</label>
				</div>
				<div class="col-75">
					<input type="text" name="price" id="price" value="<?php echo $price?>" readonly>
				</div>
				</div>    
	  
				<div class="row">
				<div class="col-25">
					<label for="fname">Details</label>
				</div>
				<div class="col-75">
					<textarea id="subject" name="details"  style="height:200px" readonly><?php echo $details?></textarea>
				</div>
				</div> 
				
				<?php
					$path='../images/package/';
					$ex='.jpg';
				?>

				<div class="row">
				<div class="col-25">
					<label for="lname">Photo</label>
				</div>
				<div class="col-75">
					<?php echo "<img class='image' width='150px' src='".$path.$photo1.$ex."'>";?>

					<?php echo "<img class='image' width='150px' src='".$path.$photo2.$ex."'>";?>

					<?php echo "<img class='image' width='150px' src='".$path.$photo3.$ex."'>";?>
				</div>
				</div>
				<div class="row">
					<input type="submit" name="formdelete" class="formbtn" value="Delete">
				</div>
				
			</form>
		</div>
				
		<div class="container">
			<form method="post" action="admin_updatetravelpackage_page.php" enctype="multipart/form-data">
				<h2 class="title"><label>Enter New Details To Update</label></h2>
				<div class="row">
				<div class="col-25">
					<label for="fname">New Package Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="nname" id="nname" placeholder="Enter the new package name..">
				</div>
				</div>			   

				<div class="row">
				<div class="col-25">
					<label for="fname">No of Days</label>
				</div>
				<div class="col-75">
					<input type="number" name="days" min="1" max="10" value="<?php echo $days?>">
				</div>
				</div>
						
				<div class="row">
				<div class="col-25">
					<label for="fname">Package Price(Rs.)</label>
				</div>
				<div class="col-75">
					<input type="text" name="price" id="price" value="<?php echo $price?>">
				</div>
				</div>    
	  
				<div class="row">
				<div class="col-25">
					<label for="fname">Details</label>
				</div>
				<div class="col-75">
					<textarea id="subject" name="details"  style="height:200px"><?php echo $details?></textarea>
				</div>
				</div> 

				

				<div class="row">
				<div class="col-25">
					<label for="lname">Upload a photo 1</label>
				</div>
				<div class="col-75">
					<br /><input type="file" name="file1" id="file1" >
				</div>
				</div>


				<div class="row">
				<div class="col-25">
					<label for="lname">Upload a photo 2</label>
				</div>
				<div class="col-75">
					<br /><input type="file" name="file2" id="file2" >
				</div>
				</div>

				<div class="row">
				<div class="col-25">
					<label for="lname">Upload a photo 3</label>
				</div>
				<div class="col-75">
					<br /><input type="file" name="file3" id="file3" >
				</div>
				</div>

				<div class="row">
					<br /><input type="submit" name="btnupdate" value="Update" class="formbtn">
				</div>
			</form>
		</div>
    </body>
</html>
<?php require_once('footer.php')?>

