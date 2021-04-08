<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=0){
        header('Location: login_page.php');
    }
?>
<?php require_once('user_navigation.php')?> 
<?php require_once('user_view_profile_navigation.php')?>

<?php
	$uname=$_SESSION['username'];
    $password=$_SESSION['pwd'];

	$uid;
	$aid;
	$GLOBAL['adone']=0;
	$GLOBAL['udone']=0;
	
	$sql1 = "select * from account where username = '$uname'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$uid = $row['uid'];
		$aid = $row['aid'];
		$password =$row['password'];
		//echo $uid;
	}

	$sql3= "select name from user where uid='".$uid."'";
	$result3 = mysqli_query($connection,$sql3);
	while($row5=$result3->fetch_assoc()){
		$name = $row5['name'];
	}
	//echo $sql3;

	$_GLOBAL['adone'] = 0;	
	$_GLOBAL['udone']=0;
	$_GLOBAL['assigndone'] = 0;
	
	if(isset($_GET['submit'])){
		$pass=(string)$_GET['password'];
		$hashpassword = md5($pass);
		//echo $password;
		//echo $hashpassword;

		$_GLOBAL['checkbooking']=checkbooking($connection,$name);
		$_GLOBAL['checkreservation']=checkreservation($connection,$uid);

		//echo $_GLOBAL['checkbooking'];
		if (($_GLOBAL['checkbooking']==0) && ($_GLOBAL['checkreservation']==0)){

			if($password == $hashpassword){
				$sql = "delete from user where uid = '$uid'";
				$result=mysqli_query($connection,$sql);
				if($result){
					$_GLOBAL['udone'] = 1;
				}else{
					$_GLOBAL['udone'] = 0;
				}
				
						
				$sql2 = "delete from account where aid = '$aid'";
				$result2=mysqli_query($connection,$sql2);
				if($result2){
					$_GLOBAL['adone'] = 1;
				}else{
					$_GLOBAL['adone'] = 0;
				}
				
				$sql4 = "delete from assign where name = '$name'";
				$result4=mysqli_query($connection,$sql4);
				if($result4){
					$_GLOBAL['assigndone'] = 1;
				}else{
					$_GLOBAL['assigndone'] = 0;
				}

				
				if ( (($_GLOBAL['udone'] == 1) && ($_GLOBAL['adone']==1) && ($_GLOBAL['assigndone'] == 1))|| (($_GLOBAL['udone'] == 1) && ($_GLOBAL['adone']==1)) ){
					//echo "done";
					echo "<script> alert('Successfully Deleted') </script>";
					header("Location: user_nonhome_page.php");
				}else{
					echo "<script> alert('Deletion is failed') </script>";
					//echo "failed";
				}
			}else{
				echo "<script> alert('Invalid Password') </script>";
			}

		}else{
			//echo "asini";
			echo "<script> alert('You have bookings') </script>";		
		}
	}

?>

<?php
	function checkbooking($connection,$name){
		//echo $uid;
		$sql="select date from assign where name='".$name."'";
		//echo $sql;
		$result=mysqli_query($connection,$sql);
		$num_rows = $result->num_rows;
		//echo $num_rows;
		if($num_rows>0){
			while($row=$result->fetch_assoc()){
				$date1=$row['date'];
				$today= date("d/m/Y");
				//echo $date1; // date of assignment
				//echo $today; // today date
				
				$array1 = explode("-",$date1);
				$year1= $array1[0];
				$month1= $array1[1];
				$dayno1= $array1[2];
				//echo "d1 -"; echo $dayno1;
				
				$array2 = explode("/",$today);
				$year2= $array2[2];
				$month2= $array2[1];
				$dayno2= $array2[0];
				//echo "d2 -"; echo  $dayno2;
				
				if((($year1==$year2)&&($month1==$month2)&&($dayno1>$dayno2)) || (($year1==$year2)&&($month1>$month2)) || ($year1>$year2) ){
				//echo "done";
					return 1;
				}else{
					return 0;
				}
			}
		}else{
			return 0;
		}
	}
?>

<?php
	function checkreservation($connection,$uid){
		//echo $uid;
		$sql="select date from resavation where uid='".$uid."'";
		//echo $sql;
		$result=mysqli_query($connection,$sql);
		$num_rows = $result->num_rows;
		//echo $num_rows;
		if($num_rows>0){
			while($row=$result->fetch_assoc()){
				$date1=$row['date'];
				$today= date("d/m/Y");
				//echo $date1; // date of assignment
				//echo $today; // today date
				
				$array1 = explode("-",$date1);
				$year1= $array1[0];
				$month1= $array1[1];
				$dayno1= $array1[2];
				//echo "d1 -"; echo $dayno1;
				
				$array2 = explode("/",$today);
				$year2= $array2[2];
				$month2= $array2[1];
				$dayno2= $array2[0];
				//echo "d2 -"; echo  $dayno2;
				
				if((($year1==$year2)&&($month1==$month2)&&($dayno1>$dayno2)) || (($year1==$year2)&&($month1>$month2)) || ($year1>$year2) ){
				//echo "done";
					return 1;
				}else{
					return 0;
				}
			}
		}else{
			return 0;
		}
	}
?>

<?php include('../../public/html/user_delete_profile.html')?>
<?php require_once('footer_user.php')?>
