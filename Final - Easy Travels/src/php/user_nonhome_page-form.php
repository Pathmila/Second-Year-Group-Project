<?php
	$path='../../public/images/category/';
	$ex='.jpg';
	$sql1="select * from category";
	$result2=$connection->query($sql1);
							
	while($row=$result2->fetch_assoc()){

		$photo1=(string)$row['photo'];
		$name=(string)$row['name'];

		echo"
			<form name='box' method='get' action='category_page.php' class='table' align='center'>
				<div class='column'>
				<div class='content'>
					<input type='text' name='name'  value='".$name."' readonly><br />
					<img src='".$path.$photo1.$ex."' class='packimg'>
				</div>
				</div>   
			</form>";
	}
?>