<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login.php');
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
        <?php require_once('user_view_profile_navigation.php')?>
		<div class="container">
        <form method="GET" action="user_addcomment_page.php">
            <label style="font-size:30px" align="center">Add Your Comment</label>
            <div class="row">
            <div class="col-25">
                <label>Description:</label>
            </div>
            <div class="col-75">
                <textarea id="description" name="description" placeholder="Write something.." style="height:200px" required></textarea>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Upload photo 1:</label>
            </div>
            <div class="col-75">
                <input type="file" name="file1" id="file1" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Upload photo 2:</label>
            </div>
            <div class="col-75">
                <input type="file" name="file2" id="file2" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Upload photo 3:</label>
            </div>
            <div class="col-75">
                <input type="file" name="file3" id="file3" required>
            </div>
            </div>

            <label style="font-size:30px" align="center">Add Ratings</label>

            <div class="row">
            <div class="col-25">
                <label>Hotel:</label>
            </div>
            <div class="col-25">
                <select name="hotel" id="hotel" required>
                    <?php
                    $sql3="select * from hotel";
                    $result2=$connection->query($sql3);
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                    }
                    ?>
                </select>               
            </div>

            <div class="col-50">
				<input type="radio" id="star5" name="rate" value="5" >
				<label for="star5" title="text">Best</label>
				<input type="radio" id="star4" name="rate" value="4" required>
				<label for="star4" title="text">Good</label>
				<input type="radio" id="star3" name="rate" value="3" required>
				<label for="star3" title="text">Moderate</label>
				<input type="radio" id="star2" name="rate" value="2" required>
				<label for="star2" title="text">Bad</label>
				<input type="radio" id="star1" name="rate" value="1" required>
				<label for="star1" title="text">Worse</label>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Guide:</label>
            </div>
            <div class="col-25">
                <select name="guide" id="guide" required>
                    <?php
                    $sql3="select * from guide";
                    $result2=$connection->query($sql3);
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                    }
                    ?>
                </select>               
            </div>

            <div class="col-50">
                <input type="radio" id="star5" name="rate2" value="5" required>
				<label for="star5" title="text">Best</label>
				<input type="radio" id="star4" name="rate2" value="4" required>
				<label for="star4" title="text">Good</label>
				<input type="radio" id="star3" name="rate2" value="3" required>
				<label for="star3" title="text">Moderate</label>
				<input type="radio" id="star2" name="rate2" value="2" required>
				<label for="star2" title="text">Bad</label>
				<input type="radio" id="star1" name="rate2" value="1" required>
				<label for="star1" title="text">Worse</label>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label>Vehicle:</label>
            </div>
            <div class="col-25">
                <select name="vehicle" id="vehicle" required>
                    <?php
                    $sql3="select * from vehicle";
                    $result2=$connection->query($sql3);
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='". $row['vid'] ."'>" .$row['vid'] ."</option>" ;
                    }
                    ?>
                </select>               
            </div>

            <div class="col-50">
				<input type="radio" id="star5" name="rate3" value="5" required>
				<label for="star5" title="text">Best</label>
				<input type="radio" id="star4" name="rate3" value="4" required>
				<label for="star4" title="text">Good</label>
				<input type="radio" id="star3" name="rate3" value="3" required>
				<label for="star3" title="text">Moderate</label>
				<input type="radio" id="star2" name="rate3" value="2" required>
				<label for="star2" title="text">Bad</label>
				<input type="radio" id="star1" name="rate3" value="1" required>
				<label for="star1" title="text">Worse</label>
            </div>
            </div>

            <div class="row">
				<input type="submit" name="submit" value="Submit" class="formbtn"><br />
            </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>