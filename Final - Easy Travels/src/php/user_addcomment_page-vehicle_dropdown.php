<?php
    $sql3="select * from vehicle";
    $result2=$connection->query($sql3);
    while($row=$result2->fetch_assoc()){
		echo "<option value='". $row['vid'] ."'>" .$row['vid'] ."</option>" ;
    }
?>