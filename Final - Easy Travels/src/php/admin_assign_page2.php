<?php require_once('admin_topnav.php') ?>
<?php require_once('menu.php') ?>
<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=1){
        header('Location: login_page.php');
    }
	$userid=$_SESSION['userid1'];
	//echo $userid;
?> 

<?php
	$_GLOBAL['assign']=0;
	$_GLOBAL['resev']=0;	
	$sql1="select * from user where uid='".$userid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $name=$row1['name'];
        $address=$row1['address'];
        $email=$row1['email'];
        $telephone=$row1['telephone'];
    }

	
	$sql="select * from resavation where resvid='".$_SESSION['reserv']."'  order by resvid desc";
	//echo $sql;
	$result=$connection->query($sql);
	while($row=$result->fetch_assoc()){
		$resvid=$row['resvid'];
		$packid=$row['packid'];
		$date=$row['date'];
		$single=$row['singlerooms'];
		$double=$row['doublerooms'];
		$family=$row['familyrooms'];
		$notravel=$row['travelers'];
		$_SESSION['resvdate']=$date;

		$sql3="select * from package where packid='".$packid."'";
		$result3=$connection->query($sql3);
		while($row=$result3->fetch_assoc()){
			$pack=(string)$row['name'];
			$price=(string)$row['price'];
			$ndays=(string)$row['days'];
		}
	}

	if(isset($_POST['asubmit'])){
		//echo "Asini";
		$hotel=$_POST['hotel'];
		$guide=$_POST['guide'];
		$vehicle=$_POST['vehicle'];
		$resvid=$_SESSION['reserv'];

		$sql7="select email from hotel where hid='".$hotel."'";
		$result7=$connection->query($sql7);
		while($row7=$result7->fetch_assoc()){
			$hemail=$row7['email'];
			$_SESSION['hemail']=$hemail;
		}

		$sql8="select email from guide where gid='".$guide."'";
		$result8=$connection->query($sql8);
		while($row8=$result8->fetch_assoc()){
			$gemail=$row8['email'];
		}

		$sql9="select email from vehicle where vid='".$vehicle."'";
		$result9=$connection->query($sql9);
		while($row9=$result9->fetch_assoc()){
			$vemail=$row9['email'];
		}

		//echo $name;
		//echo $hotel;
		
		$sql5="select resvid from assign where date='".$date."' and package='".$pack."' and name='".$name."' and email='".$email."' ";
		//echo $sql5;
		$result5=mysqli_query($connection,$sql5);
		$count = mysqli_num_rows($result5);


		
			$sql4="Insert into assign(resvid,hotel,guide,vehicle,package,price,date,name,address,email,telephone,travelers,single,doublerooms,family)
			values ('".$resvid."' ,'".$hotel."','".$guide."','".$vehicle."','".$pack."','".$price."','".$date."','".$name."','".$address."','".$email."','".$telephone."','".$notravel."','".$single."','".$double."','".$family."')";
			//echo $sql4;
			$result4=$connection->query($sql4);
			if($result4){
				$_GLOBAL['assign']=1;
			}


			$sql2= "Delete from resavation where resvid='".$_SESSION['reserv']."' ";
			//echo $sql2;
			$result2=$connection->query($sql2);
			if($result2){
				$_GLOBAL['resev']=1;
			}


			if(($_GLOBAL['resev']=1) && ($_GLOBAL['assign']=1)){
				//echo "<script> alert('Assign is Sucessfull') </script>";
				include('assign_email.php');
				include('assign_email_hotel.php');
				include('assign_email_vehicle.php');
				include('assign_email_guide.php');
				header("Location: admin_home_page.php");
			}else{
				//echo "failed";
				echo "<script> alert('Assign is Failed') </script>";
			}
		
	}
?>

		
<?php include('../../public/html/admin_assign_page2.html')?>
<?php require_once('footer.php')?>
