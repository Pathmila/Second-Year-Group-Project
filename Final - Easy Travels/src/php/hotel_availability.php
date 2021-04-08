<?php require_once('hotel_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=3){
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
        $uid=$row['uid'];
    }
?>

<?php
	//Getting total number of rooms
	$sql4="select * from hotel where hid='".$uid."'";
	//echo $sql4;
	$result4=mysqli_query($connection,$sql4);
	while($row4=$result4->fetch_assoc()){
		$totalsingle=$row4['singlerooms'];
		$totaldouble=$row4['doublerooms'];
		$totalfamily=$row4['familyrooms'];
	}

?>

<?php
	if(isset($_POST['btndate'])){
		$bdate=$_POST['bdate'];
		$_SESSION['bdate']= $bdate;
		header("Location: hotel_availability-delete.php");
	}
?>

<?php
	if(isset($_POST['formsubmit'])){
		$date=$_POST['date'];
		$sarooms=$_POST['sarooms'];
		$darooms=$_POST['darooms'];
		$farooms=$_POST['farooms'];
		
		$checkdate=check_future_date($date);
		//echo $checkdate;
		
		if($checkdate==1){
			$sql4="select * from hotel where hid='".$uid."'";
			//echo $sql4;
			$result4=mysqli_query($connection,$sql4);
			while($row4=$result4->fetch_assoc()){
				$totalsingle=$row4['singlerooms'];
				$totaldouble=$row4['doublerooms'];
				$totalfamily=$row4['familyrooms'];
			}
			
			$checked_total_single=check_total_single($totalsingle,$sarooms);
			$checked_total_double=check_total_double($totaldouble,$darooms);
			$checked_total_family=check_total_family($totalfamily,$farooms);
				
			$_GLOBAL['done']=0;
			$sql2="select * from hotelavailability where hid='".$uid."' and availability_date='".$date."'";
			//echo $sql2;
			$result2=mysqli_query($connection,$sql2);
			while($row2=$result2->fetch_assoc()){
				$hid=$row2['hid'];
				if($hid != null ){
					$_GLOBAL['done']=1;
				}else{
					$_GLOBAL['done']=0;
				}
			}
			
			//echo $_GLOBAL['done'];
			if(($checked_total_single==1) &&($checked_total_double==1) && ($checked_total_family==1) ){	
				if($_GLOBAL['done']==1){	

					$sql3="select * from hotelavailability where hid='".$uid."' and availability_date='".$date."'";
					//echo $sql3;
					$result3=mysqli_query($connection,$sql3);
					while($row3=$result3->fetch_assoc()){
						$singal=$row3['singlerooms'];
						$double=$row3['doublerooms'];
						$family=$row3['familyrooms'];
					}
					//echo $singal;
					
					$sumsingal=$sarooms+$singal;
					$sumdouble=$darooms+$double;
					$sumfamily=$farooms+$family;
					
					$checked_singal=check_sum_singal($totalsingle,$sumsingal);
					$checked_double=check_sum_double($totaldouble,$sumdouble);
					$checked_family=check_sum_family($totalfamily,$sumfamily);
					
					if(($checked_singal==1) && ($checked_double==1) && ($checked_family)){
						$sql5 = "update hotelavailability set singlerooms='".$sumsingal."',doublerooms='".$sumdouble."',familyrooms='".$sumfamily."' where hid='".$uid."' and  availability_date='".$date."'";
						//echo $sql5;
						$result5=$connection->query($sql5);
						if($result5){
							echo "<script> alert('Update is Sucessfull') </script>";
							//header("Location: hotel_home_page.php");
							$sarooms="";
							$darooms="";
							$farooms="";
							$date="";
						}else{
							//echo "failed";
							echo "<script> alert('Update is Failed') </script>";
							$sarooms="";
							$darooms="";
							$farooms="";
							$date="";
						}
					}else{
						$sarooms="";
						$darooms="";
						$farooms="";
						$date="";
						echo "<script> alert('Entered room numbers are invalid.') </script>";
					}
				}else{
					$sql = "Insert into hotelavailability(hid,availability_date,singlerooms,doublerooms,familyrooms) value('".$uid."','".$date."','".$sarooms."','".$darooms."','".$farooms."') ";
					//echo $sql;
					$result=$connection->query($sql);
					if($result){
						echo "<script> alert('Update is Sucessfull') </script>";
						$date="";
						$sarooms="";
						$darooms="";
						$farooms="";
						//header("Location: hotel_home_page.php");
					}else{
						//echo "failed";
						echo "<script> alert('Update is Failed') </script>";
						$sarooms="";
						$darooms="";
						$farooms="";
						$date="";
					}
				}
			}else{
				$sarooms="";
				$darooms="";
				$farooms="";
				$date="";
				echo "<script> alert('Entered room numbers are invalid.') </script>";
			}
		}else{
			echo "<script> alert('Invalid date.') </script>";
			$sarooms="";
			$darooms="";
			$farooms="";
			$date="";
		}
	}
?>
<?php
	function check_total_single($totalsingle,$sarooms){
		if($totalsingle>=$sarooms){
			return 1;
		}else{
			return 0;
		}
	}
?>

<?php
	function check_total_double($totaldouble,$darooms){
		if($totaldouble>=$darooms){
			return 1;
		}else{
			return 0;
		}
	}
?>

<?php
	function check_total_family($totalfamily,$farooms){
		if($totalfamily>=$farooms){
			return 1;
		}else{
			return 0;
		}
	}
?>
<?php
	function check_sum_singal($totalsingal,$sumsingal){
		if($totalsingal>=$sumsingal){
			return 1;
		}else{
			return 0;
		}
	}
?>

<?php
	function check_sum_double($totaldouble,$sumdouble){
		if(($totaldouble>=$sumdouble)){
			return 1;
		}else{
			return 0;
		}
	}
?>

<?php
	function check_sum_family($totalfamily,$sumfamily){
		if($totalfamily>=$sumfamily){
			return 1;
		}else{
			return 0;
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

<?php include('../../public/html/hotel_availability.html')?>
<?php require_once('footer_hotel.php')?>        
