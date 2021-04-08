<?php require_once('vehicle_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=4){
        header('Location: login_page.php');
    }
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql="select * from account where aid='".$aid."'";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
        $uid=(string)$row['uid'];
    }
?>

<?php
	if(isset($_POST['btndate'])){
		$bdate=$_POST['bdate'];
		$_SESSION['bdate']= $bdate;
		//echo $_SESSION['bdate'];
		header("Location: vehicle_change_availability-delete.php");
	}
?>

<?php
	$_GLOBAL['indb']=0;
	$_GLOBAL['vid']="";
	if(isset($_POST['formsubmit'])){
		$day=$_POST['date'];
		
		$checkdate=check_future_date($day);
		
		if($checkdate==1){
			$sql3="select vid from vehicleavailability where vid='".$uid."' and availability_date='".$day."'";
			//echo $sql3;
			$result3=$connection->query($sql3);
			while($row3=$result3->fetch_assoc()){
				$_GLOBAL['vid']=$row3['vid'];
			}
			if($_GLOBAL['vid']==null){
				$_GLOBAL['indb']=1;
			}else{
				$_GLOBAL['indb']=0;
			}
			
			//echo $_GLOBAL['indb'];
			
			if($_GLOBAL['indb']==1){
				$sql2 = "Insert into vehicleavailability(vid,availability_date) values ('".$uid."' , '".$day."') ";
				//echo $sql2;
				$result2=$connection->query($sql2);
				if($result2){
					echo "<script> alert('Update is Sucessfull') </script>";
					//header("Location: vehicle_home_page.php");
				}else{
					//echo "failed";
					echo "<script> alert('Update is Failed') </script>";
				}
			}else{
				echo "<script> alert('This date is already added as an unavailable date.') </script>";
			}
		}else{
			echo "<script> alert('Invalid date.') </script>";
			$day="";
		}
	}
?>

<?php
	function check_future_date($date){
		$current=date("d/m/Y");
		//echo $current;//14/11/2020
		//echo $date;//2020-11-17
		$array1 = explode("/",$current);
		$year1= $array1[2];
		$month1= $array1[1];
		$dayno1= $array1[0];
		
		$array2 = explode("-",$date);
		$year2= $array2[0];
		$month2= $array2[1];
		$dayno2= $array2[2];
		
		if((($year1==$year2)&&($month1==$month2)&&($dayno1<$dayno2)) || (($year1==$year2)&&($month1<$month2)) || ($year1<$year2) ){
			//echo "done";
			return 1;
		}else{
			return 0;
		}
	}
?>

	<?php
	if(isset($_POST['formdelete'])){
		$day=$_POST['date'];
	
		
			//echo $day;
			$sql3 = "delete from vehicleavailability where vid='".$uid."' and availability_date='".$day."' ";
			//echo $sql;
			$result3=$connection->query($sql3);
			if($result3){
				echo "<script> alert('Deletion is Sucessfull') </script>";
				//header("Location: guide_home.php");
			}else{
				//echo "failed";
				echo "<script> alert('Deletion is Failed') </script>";
			}
		}else{
			//echo "<script> alert('This is not an unavailable Date.') </script>";
			
		}

	
?>


<?php include('../../public/html/vehicle_change_availability.html')?>
<?php require_once('footer_vehicle.php')?>