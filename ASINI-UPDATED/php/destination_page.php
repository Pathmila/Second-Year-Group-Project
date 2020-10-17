<?php 
	require_once('connect.php');
	session_start();

?>
<?php require_once('user_nonnavigation.php')?> 

<?php
            if(isset($_GET['dropsubmit'])){
				$_SESSION['dname']=$_GET['destination'];
				//echo $_SESSION['dname'];
                header("Location: search_destination_page.php");
            }
		?>

<?php  
            if(isset($_GET['viewsubmit'])){
				$_SESSION['dname']=$_GET['destname'];
                header("Location: search_destination_page.php");
            }
		?>

<html>
	<head>
		<title>EasyTravels.php</title>
		<link rel="stylesheet" type="text/css" href="../css/destination_page.css">
		
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
	</head>
	<body>	
		<br />
		<div class="container">
			<form name="select" method="get" action="destination_page.php">
			<h2 class="title"><label>Select Your Destination</label></h2>
				<div class="row">
				<div class="col-25">
					<label for="fname">Destination:</label>
				</div>	
				<div class="col-50">
					<select name="destination" id="destination">
					<?php
						$sql2="select * from destination";
						$result2=$connection->query($sql2);
						while($row=$result2->fetch_assoc()){
							echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
						}
					?>
					</select>
				</div>
				<div class="col-25">
					&nbsp
					<input type="submit" name="dropsubmit" value="Search" class="formbtn">				
				</div>
				</div>
			</form>
		</div>

<!--
		<table align="center" cellpadding ="10px" cellspacing="10px" style=" border-radius:10px; font-weight:bold; ">
			<label>Search </label>
			<tr>			
				<td>
					<div class="row">
					<select name="subcat" id="subcat">
						<?php
							//$sql3="select * from destination";
							//$result2=$connection->query($sql3);
							//while($row=$result2->fetch_assoc()){
							//	echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
							//}
						?>
						</select>
            		</div>
				</td>
			
				<td><button class="btnsearch">Search</button></td>
			</tr>
		</table>
		</div>
						-->			

		
		<div class="container1">
		<div class="row">
			
    	<?php
			$path='../images/destination/';
			$ex='.jpg';
            $sql1="select * from destination";
			$result2=$connection->query($sql1);

			

			while($row=$result2->fetch_assoc()){

				$photo1=(string)$row['photo'];
				$name=(string)$row['name'];
				$id=(string)$row['destid'];

				echo"
				<form name='box' method='get' action='destination_page.php' class='table' align='center'>
                <div class='column'>
                <div class='content'>
                <input type='text' name='destname' value='".$name."' class='text' readonly><br />
                <img src='".$path.$photo1.$ex."' class='pack-img'>
        		<br /><br /><a><input type='submit' name='viewsubmit' value='View More Details' class='viewbtn'></a><br />
                </div>
                </div>   
				</form>
            ";
			}
		?>
		</div>
		</div>


		
			
	</body>
</html>
<?php require_once('footer.php')?>