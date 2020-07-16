<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
    }
    ?>


        <?php
            if(isset($_GET['submit'])){
                $_SESSION['cate']=$_GET['cat'];
                $_SESSION['subcate']=$_GET['subcat'];
                //echo "asini";
                header('Location: user_package_page.php');
            
            } 
        ?>
        
<?php require_once('user_navigation.php')?> 
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body>     
    <img src="../images/package.jpg" class="banner"><img src="../images/package1.jpg" class="banner">
    <div class="container">
        <form method="GET" action="user_category_page.php">
            <label style="font-size:30px" align="center">Select Your Package</label>
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
                <label for="lname">No of Days:</label>
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
                <br /><input type="submit" name="submit" value="Search" class="formbtn"><br />
            </div>
        </form>
        </div>
	</body>
</html>
<?php require_once('footer.php')?>
