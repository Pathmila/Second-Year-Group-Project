<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<html>
	<head>
		<title>EasyTravels.php</title>
		<link rel="stylesheet" type="text/css" href="../css/search_destination_page.css">
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
	</head>
	<body>	
		<br />
        <!--<button class="packbtn"><span>View Packages</span></button><br /><br /><br /><br />-->
        <?php
			$path='../images/destination/';
			$ex='.jpg';
			$name=$_SESSION['dname'];
            $sql1="select * from destination where name='$name'";
            //echo $sql1;
			$result2=$connection->query($sql1);
			while($row=$result2->fetch_assoc()){
				$destid=(string)$row['destid'];
				//echo $_SESSION['id_dest'];
				$photo1=(string)$row['photo'];

				echo"
					<form method='GET' action='user_package	_for_destion_page.php' class='table' align='center'>
						<div class='row'>
							<br /><input type='text' name='name' style='font-size:35px; font-weight:bold; color:white; background-color:transparent; height:50px; text-align:center;'  value='".$row['name']."' readonly>
						</div>
						</div><br/>
						<div class='row'>
							<input type='submit' class='packbtn' name='destsubmit' value='View Travel Packages in ".$row['name']."'>
						</div>
						</div><br/>
						<div class='row'>
							<div class='line'>
								<img class='image'  width='350px' height='250px' src='".$path.$photo1.$ex."'>
							</div>
						</div>
						<div class='row'>
							<text area name=destription readonly>".$row['description']."</textarea>
						</div>
					</form><br /><br />
				";
			}
		?>		
		
	</body>
	
</html>

	

<?php require_once('footer.php')?>