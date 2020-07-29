<?php require_once('user_nonnavigation.php')?>    
<?php 
    require_once('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user_home_page.css">
		<link rel="stylesheet" type="text/css" href="../css/destination_page.css">
    </head>
    <body>

        <div class="container">
            <br />  
            <div class="video" >	
                <video id="myVideo" width="60%" style="display:block; margin:0 auto;" autoplay controls muted>
                    <source src="../images/web.mp4" type="video/mp4">
                </video>
            </div>
            <br /><br /> 
            <!--<div class="slideshow">
                <?php //require_once('slideshow.php')?>
            </div>   
            --> 
            <div class="pack">
                <div class="title">
                    <h2>Book Your Package</h2>
                </div>             
                
				<div class="container1">
						<div class="row">
							
						<?php
							$path='../images/category/';
							$ex='.jpg';
							$sql1="select * from category";
							$result2=$connection->query($sql1);

							

							while($row=$result2->fetch_assoc()){

								$photo1=(string)$row['photo'];
								$name=(string)$row['name'];

								echo"
								<form name='box' method='get' action='category_page.php' class='table' align='center'>
								<div class='column'>
								<div class='content'>
								<input type='text' name='name' class='text'  value='".$name."' readonly><br />
								<img src='".$path.$photo1.$ex."' class='packimg'>
								</div>
								</div>   
								</form>
							";
							}
						?>
					</div>
				</div>

				
                <form method='GET' action="category_page.php" class='table' align='center'>
                    <input type="submit" name="catbtn" value="Select Your Package" class="catbtn">
                </form>
            </div>
		</div>
    </body>
</html>
<?php require_once('footer.php')?>