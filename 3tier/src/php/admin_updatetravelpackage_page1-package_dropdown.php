<?php
    $sql3="select * from package";
    $result2=$connection->query($sql3);
    while($row=$result2->fetch_assoc()){
        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
    }
?>