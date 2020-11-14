<?php require_once('guide_navigation.php')?> 
<?php 
    require_once('../../config/connect.php');
    session_start();
?>
<?php
	$username=$_SESSION['username'];
	$password=$_SESSION['pwd'];
	$aid=$_SESSION['aid'];
	
	$sql2="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result2=mysqli_query($connection,$sql2);
	while($row2=$result2->fetch_assoc()){
        $uid=(string)$row2['uid'];
    }
?>

<?php
	$_GLOBAL['indb']=0;
	$_GLOBAL['gid']=0;
	if(isset($_POST['formsubmit'])){
		$day=$_POST['date'];
		
		$checkdate=check_future_date($day);
		//echo $checkdate;
		
		if($checkdate==1){
			$sql3="select gid from guideavailability where gid='".$uid."' and availability_date='".$day."'";
			//echo $sql3;
			$result3=$connection->query($sql3);
			while($row3=$result3->fetch_assoc()){
				$_GLOBAL['gid']=$row3['gid'];
			}
			if($_GLOBAL['gid']==null){
				$_GLOBAL['indb']=1;
			}else{
				$_GLOBAL['indb']=0;
			}
			
			//echo $day;
			if($_GLOBAL['indb']==1){
				$sql = "Insert into guideavailability(gid,availability_date) values ('".$uid."' , '".$day."') ";
				//echo $sql;
				$result=$connection->query($sql);
				if($result){
					echo "<script> alert('Update is Sucessfull') </script>";
					//header("Location: guide_home.php");
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

<?php include('../../public/html/guide_change_availability.html')?>
<?php require_once('footer.php')?>