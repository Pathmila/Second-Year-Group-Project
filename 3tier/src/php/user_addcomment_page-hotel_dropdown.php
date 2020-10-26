<?php
    $sql3="select * from hotel";
    $result2=$connection->query($sql3);
    while($row=$result2->fetch_assoc()){
        echo "<option value='". $row['hid'] ."'>". $row['hid'] ."&nbsp--&nbsp" .$row['name'] ."</option>" ;
    }
?>