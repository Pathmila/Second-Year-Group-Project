<html>
    <head>
        <title>easytravels </title>
    </head>
    <body>
            <?php
             $servername="localhost";
             $username="root";
             $password="";
             $dbname="easytravels";
         
             $connection=mysqli_connect($servername,$username,$password,$dbname) or die("DB connection failed");

            $sql5    = "SELECT * FROM hotelavailability WHERE hid='$hid'";
            $result = mysql_query($connection,$sql5) ;

            while ($row    = mysql_fetch_array($result))
            {

                $sroomno     = $row['sroomno'];
                $droomno = $row['droomno'];
                $froomno= $row['froomno'];
            }
            ?>
        <form action="test.php" method="post">
        sroomno 
            <input class="input" typy="number" id="sroomno" name="sroomno" value= "<?php echo $row ['Name']; ?> "size=10>required>
            droomno
            <input class="input" typy="number" id="droomno" name="droomno" value= "<?php echo $row ['Name']; ?> "size=10>required>
            froomno
            <input class="input" typy="number" id="froomno" name="froomno" value= "<?php echo $row ['Name']; ?> "size=10>required>
            <input type="submit" name= "submit" value="Update">
        </form>
    </body>
</html>