<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('connect.php');
    session_start();
?>

 <?php
    if(isset($_POST['submit'])){
		$id=$_POST['id'];
		//echo $id;
		$sql="Delete from messages where id='".$id."'"; 
		//echo $sql;
		$result2 = mysqli_query($connection,$sql);
        if($result2){
			//echo "<script> confirm() </script>";				
			echo "<script> alert('Delete is Sucessfull') </script>";				
			header("Location: admin_home_page.php");
        }else{
			//echo "failed";
			echo "<script> alert('Delete is failed') </script>";				
			//header("Location: admin_home_page.php");
        }  
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EasyTravels.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_addcategory_page.css">
    </head>
    <body> 

        <div class="container">
			<h2 class="title" align="center"><label>Message Details</label></h2>
			<div style="overflow-x:auto;">
			<table border=1 padding=50px align="center" class="viewtable">
			<tr class="subtitle">
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Telephone</td>
				<td>Details</td>
				<td align="center">Delete Button</td>
			</tr>
			<?php
				$sql="select * from messages order by id desc ";
				//echo $sql;
				$result=$connection->query($sql);
				while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>0".$row['telephone']."</td>";
					echo "<td>".$row['details']."</td>";
					echo "<form method='post' action='admin_view_report_general5.php'>";
					echo "<input type='hidden' name='id' value='".$row['id']."'>";
					echo "<td><input type='submit' name='submit' value='Delete' class='formbtn'></td>";
					echo "</form>";
					echo "</tr>";
				}
			?>
            </table>
			</div>
        </div>
    </body>
</html>
<?php require_once('footer.php')?>


