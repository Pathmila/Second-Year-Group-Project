<?php require_once('user_nonnavigation.php')?>    
<?php require_once('connect.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/user_home_page.css">
    </head>
    <body>

        <div class="container">
            <br />  
            <div class="video" >	
                <video id="myVideo" width="60%" style="display:block; margin:0 auto;" controls="controls" autoplay>
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
                <?php
                    $path='../images/';
                    $ex='.jpg';

                    $sql1="select * from category";
                    $result2=$connection->query($sql1);
                    while($row=$result2->fetch_assoc()){
                        $photo1=(string)$row['photo'];                         
                        echo "<div class='column'>";
                        echo "<table cellspacing='10px' class='table' align='center'>";
                            echo "<tr>";
                                echo "<th>".$row['name']."</th>"; 
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>
                                        <img class='image'  width='250px' height='200px' src='".$path.$photo1.$ex."'>	  
                                    </td>";	
                            echo "</tr>";
                        echo "</table>";
                        echo "</div>";                    
			        }
		        ?>			
               <a href="category_page.php"><button class="view">Select Your Package</button></a>
            </div>
            <div class="comment">
                <p>Comments</p>
            </div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>