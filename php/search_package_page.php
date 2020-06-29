<?php require_once('connect.php');?>
<?php require_once('user_nonnavigation.php')?> 
<?php
    $name=$_GET['destination'];
?>
<html>
	<head>
		<title>EasyTravels.php</title>
		<link rel="stylesheet" type="text/css" href="../css/destination_page.css">
		<link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
	</head>
	<body>	
        <?php
			$path='../images/';
			$ex='.jpg';
            $sql1="select * from destination where name='$name'";
            //echo $sql1;
			$result2=$connection->query($sql1);
			while($row=$result2->fetch_assoc()){

				$photo1=(string)$row['photo'];
				echo "<br />";
				echo "<table cellspacing='10px' class='table' align='center'>";
					echo "<tr>";
						echo "<th colspan='3'>".$row['name']."</th>"; 
					echo "</tr>";
					echo "<tr>";
						echo "<td><img class='image'  width='350px' height='250px' src='".$path.$photo1.$ex."'></td>";	
					echo "</tr>";
					echo "<tr>";
						echo "<td colspan='3'>".$row['description']."</td>";
					echo "</tr>";
				echo "</table>";
				echo "<br /><br />";
			}
		?>			
	</body>
</html>
<?php require_once('footer.php')?>