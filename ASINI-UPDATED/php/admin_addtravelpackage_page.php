<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
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
			$targetdir = '../images/package/';   
			$name=$nextid;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			$targetdir = '../images/package/';   
			$name=$nextid+1;
			$ext=".jpg";
			$targetfile = $targetdir.$name.$ext;

			if (move_uploaded_file($_FILES['image1']['tmp_name'], $targetfile)) {
			
				//echo "Done";
			} else { 
				//echo "Not uploaded";
			
			}
			
			$targetdir = '../images/package/';   
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

<html>

<?php
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

		$sql2="INSERT INTO package(packid,catname,subcatname,name,days,price,details,photo1,photo2,photo3) values 
			('".$nextpack."','".$catname."','".$subcatname."','".$name."','".$days."','".$price."','".$details."','".$image."','".$image2."','".$image3."')"; 
		//echo $sql2;
		$result2 = mysqli_query($connection,$sql2);
		
		
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
			$result38 = mysqli_query($connection,$sql8);
		}
		
		if($_POST['destination5'] != 'null'){
			$d5=$_POST['destination5'];
			$sql9="INSERT INTO packdestination(packid,destid) values('".$nextpack."','".$d5."')"; 
			//echo $sql9;
			$result9 = mysqli_query($connection,$sql9);
		}

	
		
		
		
		if($result2 && ( $result3 || $result6 || result7 || result8 || result9 )){
			echo "<script> alert('Insert is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
		}else{
			//echo "failed";
			header("Location: admin_home_page.php");
		} 
	
	}
?>

    <head>
        <title>EasyTravels.com</title>    
        <meata name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS TO CSS AND JS --->
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <div class="container">
        <form method="post" action="admin_addtravelpackage_page.php" enctype="multipart/form-data">
			<h2 class="title"><label>Add Travel Package</label></h2>
            <div class="row">
            <div class="col-25">
                <label for="fname">Category Name</label>
            </div>
            <div class="col-75">
                <select name="cat" id="cat">
                    <?php
                        $sql2="select * from category";
                        $result2=$connection->query($sql2);
                        while($row=$result2->fetch_assoc()){
                            echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                        }
                    ?>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Subcategory Name</label>
            </div>
            <div class="col-75">
                <select name="subcat" id="subcat">
                    <?php
                    $sql3="select * from subcategory";
                    $result2=$connection->query($sql3);
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                    }
                    ?>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="fname">Package Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" placeholder="Enter the package name.." id="name" required>
            </div>
            </div>
   
			
            <div class="row">
            <div class="col-25">
                <label for="fname">No of Days</label>
            </div>
            <div class="col-75">
                <input type="number" name="number" placeholder="Enter the no of days.." id="number" min="1" max="50" required>
            </div>
            </div>
			
			 <div class="row">
            <div class="col-25">
                <label for="fname">Destination 1</label>
            </div>
            <div class="col-75">
            <select name="destination1" id="destination1">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
			
						echo "<option value='null'>Not Selected</option>";
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['destid'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>   

            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 2</label>
            </div>
            <div class="col-75">
            <select name="destination2" id="destination2">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						echo "<option value='null'>Not Selected</option>";
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['destid'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div> 
 
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 3</label>
            </div>
            <div class="col-75">
            <select name="destination3" id="destination3">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						echo "<option value='null'>Not Selected</option>";
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['destid'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>
            
            
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 4</label>
            </div>
            <div class="col-75">
            <select name="destination4" id="destination4">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						echo "<option value='null'>Not Selected</option>";
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['destid'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>
            
            <div class="row">
            <div class="col-25">
                <label for="fname">Destination 5</label>
            </div>
            <div class="col-75">
            <select name="destination5" id="destination5">
					<?php
					    $sql2="select * from destination";
					    $result2=$connection->query($sql2);
						echo "<option value='null'>Not Selected</option>";
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['destid'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
				</select>
            </div>
            </div>
                    
            <div class="row">
            <div class="col-25">
                <label for="fname">Package Price</label>
            </div>
            <div class="col-75">
                <input type="text" name="price" placeholder="Enter the price of the package.." id="price" required>
            </div>
            </div>    
  
            <div class="row">
            <div class="col-25">
                <label for="fname">Details</label>
            </div>
            <div class="col-75">
                <textarea id="details" name="details" placeholder="Write the details.." style="height:200px"></textarea>
            </div>
            </div> 

            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo 1</label>
            </div>
            <div class="col-75">
                <br /><input type="file" name="image" id="file1" required>
            </div>
            </div>


			<div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo 2</label>
            </div>
            <div class="col-75">
                <br /><input type="file" name="image1" id="file1" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Upload a photo 3</label>
            </div>
            <div class="col-75">
                <br /><input type="file" name="file3" id="file3" required>
            </div>
            </div>

            <div class="row">
                <br /><input type="submit" value="Submit" name="submit" class="formbtn">
            </div>
        </form>
        </div>

    </body>
</html>
<?php require_once('footer.php')?>