<?php require_once('user_navigation.php')?> 
<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/contact_page.css">
    </head>
    <body>
        <img src="../images/banner.jpg" class="banner">
        <div class="container">
            <form>
                <label style="font-size:30px" align="center">Plan Your Trip Our Travel Experts Can Help You.</label>
                <div class="line">
                <div class="col-25">
                    <label for="fname">Name:</label>
                </div>
                <div class="col-75">
                    <input name="name" id="name" placeholder="Name" type="text" required>
                </div>
                </div>
                <div class="line">
                <div class="col-25">
                    <label for="lname">Telephone No:</label>
                </div>
                <div class="col-75">
                    <input name="telephone" id="telephone" placeholder="Telephone" type="tel" pattern="[0-9]{10}" required >
                </div>
                </div>
                <div class="line">
                <div class="col-25">
                    <label for="lname">Email:</label>
                </div>
                <div class="col-75">
                    <input name="email" id="email" placeholder="Email" type="email" required>
                </div>
                </div>
                <div class="line">
                <div class="col-25">
                    <label for="lname">Message:</label>
                </div>
                <div class="col-75">
                    <textarea id="details" name="details" placeholder="Write the message.." style="height:200px"></textarea>
                </div>
                </div>
                <div class="line">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>

