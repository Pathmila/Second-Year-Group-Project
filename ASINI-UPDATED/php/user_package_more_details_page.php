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
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
		<link rel="stylesheet" type="text/css" href="../css/package_more_details_page.css">
		
	</head>
	<body>		
		<br /><br />
        <?php
			$id=$_SESSION['packid'];
			
			$path='../images/package/';
			$ex='.jpg';

            $sql1="select * from package where packid='".$id."'";
			$result2=$connection->query($sql1);

			//echo $sql1;

			while($row=$result2->fetch_assoc()){
				$id=(string)$row['packid'];
				$details=(string)$row['details'];
				$photo1=(string)$row['photo1'];
				$photo2=(string)$row['photo2'];
				$photo3=(string)$row['photo3'];	
				//$button="<a href='book_page.php?id=".$id."'><button>Book Now</button></a>";
				$button="<button>Book Now</button>";

				echo"
					<form method='GET' action='book_page.php' class='table' align='center'>
						<div class='row'>
						<div class='col-25'>
							<label>Package Name:</label>
						</div>
						<div class='col-75'>
							<input type='text' name='name' value='".$row['name']."' readonly>
						</div>
						</div>
						<div class='row'>
							<div class='line'>
								<div class='column'>
									<img class='image' width='100px' height='80px' src='".$path.$photo1.$ex."'>
								</div>
								<div class='column'>
									<img class='image' width='100px' height='80px' src='".$path.$photo2.$ex."'>
								</div>
								<div class='column'>
									<img class='image' width='100px' height='80px' src='".$path.$photo3.$ex."'>
								</div>
							</div>
						</div>
						<div class='row'>
						<div class='col-25'>
							<label>No of Days:</label>
						</div>
						<div class='col-75'>
							<input type='text' name='days' value='".$row['days']."' readonly>
						</div>
						</div>
						<div class='row'>
						<div class='col-25'>
							<label>Price For A Person(Rs.):</label>
						</div>
						<div class='col-75'>
							<input type='text' name='price' value=".$row['price']." readonly>
						</div>
						</div>
						<div class='row'>
							<br />$details
            			</div><br />
						<div class='row'>
							$button<br /><br />
            			</div>
					</form><br /><br />
				";
			}
		?>			
	</body>
</html>
<?php require_once('footer.php')?>
