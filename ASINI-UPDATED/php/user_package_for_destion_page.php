<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 

<?php
    $dname=$_GET['name'];
?>

<?php
    if(isset($_GET['submit'])){
		$_SESSION['packid']=$_GET['pack_id'];
		echo $_SESSION['packid'];
        header("Location: user_package_more_details_page.php");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/package_page.css">
	</head>
	<body>
	<div class="container">
		<div class="row">
		
			
    	<?php	

			$path='../images/package/';
			$ex='.jpg';
			$sql1="select * from destination d, packdestination pd, package p 
			where p.packid=pd.packid AND d.destid=pd.destid AND d.name='".$dname."' ";
            $result2=$connection->query($sql1);
            
            while($row=$result2->fetch_assoc()){
				$id=(string)$row['packid'];
				$details=(string)$row['details'];
                $photo1=(string)$row['photo1'];
				$name=(string)$row['name'];
				$price=(string)$row['price'];
				$_SESSION['packid']=$id;
                

                $sql2="select * from packdestination pd, destination d where pd.packid='".$id."' AND pd.destid=d.destid " ;
                $result3=$connection->query($sql2);

				echo"
				<form method='GET' action='packages_for_destination_page.php' class='table' align='center'>
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
				</form>
            ";
            }
           
		?>
		</div>
		</div>
		</div>
		</div>


		
	</body>
</html>
<?php require_once('footer.php')?>


    
        
    