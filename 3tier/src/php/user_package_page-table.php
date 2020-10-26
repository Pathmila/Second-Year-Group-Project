<?php	
	$cat=$_SESSION['cate'];
	$subcat=$_SESSION['subcate'];
	$path='../../images/package/';
	$ex='.jpg';

    $sql1="select * from package where catname='".$cat."' AND subcatname='".$subcat."' ";
    $result2=$connection->query($sql1);
            
    while($row=$result2->fetch_assoc()){
		$id=(string)$row['packid'];
		$details=(string)$row['details'];
        $photo1=(string)$row['photo1'];
		$name=(string)$row['name'];
		$price=(string)$row['price'];
		
		$sql2="select * from packdestination pd, destination d where pd.packid='".$id."' AND pd.destid=d.destid " ;
        $result3=$connection->query($sql2);
			
		echo"
		<form method='GET' action='user_package_page.php' class='table' align='center'>
			<input type='hidden' name='pack_id' value='".$id."'>
            <div class='column'>
            <div class='content'>
                <h3 style='color:yellow';>$name</h3>
                <img src='".$path.$photo1.$ex."' class='pack-img'>
				<h3 style='color:red';>Price per person ".$price."</h3>
                <h3 style='color:brown';>Locations</h3>";
                while($row1=$result3->fetch_assoc()){
                    $destname=(string)$row1['name'];
                    echo $destname.' ';
                }
                echo"				
					<br /><br /><a><input type='submit' name='submit' value='View More Details' class='viewbtn'></a><br />
            </div>
			</div>   
		</form>";
    }
?>