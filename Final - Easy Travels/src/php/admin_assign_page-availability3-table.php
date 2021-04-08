<?php require_once('../../config/connect.php');
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
?>
<?php
	$date=$_SESSION['reservation'];	
		echo"
		
		<div class='container2'>			
		<div style='overflow-x:auto;'>
		<table id='table_not_available_guides' border=1 padding=50px align='center' class='viewtable'>
			<tr class='theads' style='height:50px;'>
				<td>ID</td>
				<td>Name</td>
				<td>No of Available Single Rooms</td>
				<td>Price of Single Room</td>
				<td>No of Available Double Rooms</td> 
				<td>Price of Double Room</td>
				<td>No of Available Family Rooms</td>
				<td>Price of Family Room</td>
				
			</tr>
		";
		$path='../../public/images/hotel/';
		$ex='.jpg';
	
		$sql3="select * from hotel WHERE hid NOT IN (select hid from hotelavailability where availability_date = '".$date."')";
		//echo $sql2;
		$result3=$connection->query($sql3);
		while($row3=$result3->fetch_assoc()){	
			echo "<tr style='height:50px;'>";
			echo "<td>".$row3['hid']."</td>";
			echo "<td>".$row3['name']."</td>";
			echo "<td>".$row3['singlerooms']."</td>";
			echo "<td>".$row3['singleroomprice']."</td>";
			echo "<td>".$row3['doublerooms']."</td>";
			echo "<td>".$row3['doubleroomprice']."</td>";
			echo "<td>".$row3['familyrooms']."</td>";
			echo "<td>".$row3['familyroomprice']."</td>";
			echo "</tr>";
		}
	
		
		$sql1="select * from hotelavailability where availability_date = '".$date."'";
		//echo $sql1;
		$result1=$connection->query($sql1);
		while($row1=$result1->fetch_assoc()){				
			$hid=$row1['hid'];			
			$unavailsingle=$row1['singlerooms'];
			$unavaildouble=$row1['doublerooms'];
			$unavailfamily=$row1['familyrooms'];
			//echo $unavailsingle;
		
			$sql2="select * from hotel where hid = '".$hid."' ";
			//echo $sql2;
			$result2=$connection->query($sql2);
			while($row2=$result2->fetch_assoc()){
				$name=$row2['name'];
				$totsingle=$row2['singlerooms'];
				$totdouble=$row2['doublerooms'];
				$totfamily=$row2['familyrooms'];
				$sprice=$row2['singleroomprice'];
				$dprice=$row2['doubleroomprice'];
				$fprice=$row2['familyroomprice'];
						
				$rsingle=$totsingle-$unavailsingle;
				$rdouble=$totdouble-$unavaildouble;
				$rfamily=$totfamily-$unavailfamily;
				
				//echo $rsingle;
				
				echo "<tr style='height:50px;'>";
				echo "<td>".$hid."</td>";
				echo "<td>".$name."</td>";
				echo "<td>".$rsingle."</td>";
				echo "<td>".$sprice."</td>";
				echo "<td>".$rdouble."</td>";
				echo "<td>".$dprice."</td>";
				echo "<td>".$rfamily."</td>";
				echo "<td>".$fprice."</td>";
				echo "</tr>";
			}
			
		}
		echo "</table></div></div>";
	
?>