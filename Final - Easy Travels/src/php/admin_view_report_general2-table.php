<?php require_once('../../config/connect.php');
    
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	if(isset($_POST['submit'])){
		echo "
		<br /><br />
		<div style='overflow-x:auto;'>
		<table border=1 padding=50px align='center' class='viewtable'>
		<tr class='theads'>
			<td>ID</td>
			<td>Name</td>
			<td>No of Packages</td>				
		</tr>";
		
		$destid = $_POST['destination'];
				
		$sql1="select * from destination where destid='$destid'";
		//echo $sql;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){
			echo "<tr class='ttext'>";
			echo "<td align='center'>".$row1['destid']."</td>";
			echo "<td align='center'>".$row1['name']."</td>";					
		}				
				
		$sql="select count(packid) from packdestination where destid='$destid'";
		//echo $sql;
		$result=$connection->query($sql);
		while($row=$result->fetch_assoc()){					
			echo "<td align='center'>".$row['count(packid)']."</td>";
			echo "</tr>";
		}				
	}
	
	echo "</table>";
?>