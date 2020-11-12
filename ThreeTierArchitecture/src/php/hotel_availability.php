<?php require_once('hotel_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
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
	if(isset($_POST['formsubmit'])){
		$date=$_POST['date'];
		$sarooms=$_POST['sarooms'];
		$darooms=$_POST['darooms'];
		$farooms=$_POST['farooms'];
		
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
						header("Location: hotel_home_page.php");
					}else{
						//echo "failed";
						echo "<script> alert('Update is Failed') </script>";
					}
				}else{
					$sarooms="";
					$darooms="";
					$farooms="";
					echo "<script> alert('Entered room numbers are invalid.') </script>";
				}
			}else{
				$sql = "Insert into hotelavailability(hid,availability_date,singlerooms,doublerooms,familyrooms) value('".$uid."','".$date."','".$sarooms."','".$darooms."','".$farooms."') ";
				//echo $sql;
				$result=$connection->query($sql);
				if($result){
					echo "<script> alert('Update is Sucessfull') </script>";
					header("Location: hotel_home_page.php");
				}else{
					//echo "failed";
					echo "<script> alert('Update is Failed') </script>";
				}
			}
		}else{
			$sarooms="";
			$darooms="";
			$farooms="";
			echo "<script> alert('Entered room numbers are invalid.') </script>";
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
		if($totaldouble>=$sumdouble){
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


<?php include('../../public/html/hotel_availability.html')?>
<?php require_once('footer.php')?>        
