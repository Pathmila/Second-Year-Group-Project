<?php require_once('../../config/connect.php');
    session_start();
    if($_SESSION['admin']!=2){
        header('Location: login_page.php');
    }
	$uname=$_SESSION['username'];
	$aid=$_SESSION['aid'];
?>
<?php require_once('guide_navigation.php')?> 
<?php require_once('guide_view_navigation.php')?>

<?php	
	$sql1 = "select * from account where aid = '".$aid."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row=$result1->fetch_assoc()){
		$_SESSION['id'] = $row['uid'];
		$aid = $row['aid'];
		$password = $row['password'];
		//echo $password;
	}
	$uid=$_SESSION['id'];
	$sql4 = "select photo from guide where gid = '$uid'";
	$result4=mysqli_query($connection,$sql4);
	while($row4=$result4->fetch_assoc()){
		$photo = $row4['photo'];
	}
		
	if(isset($_GET['submit'])){
		$pass=$_GET['password'];
		$hashpassword = md5($pass);
		
		$_GLOBAL['checkbooking']=checkbooking($connection,$uid);
		//echo $_GLOBAL['checkbooking'];

		if(($_GLOBAL['checkbooking']==0)){
			if($password == $hashpassword){
				$sql1 = "delete from guide where gid = '$uid'";
				$result1=mysqli_query($connection,$sql1);
				if($result1){
					$_GLOBAL['udone'] = 1;
				}else{
					$_GLOBAL['udone'] = 0;
				}
				//File deletion part start
					$targetdir = '../../public/images/guide/';   
					$name=$photo;
					$ext=".jpg";
					$targetfile = $targetdir.$name.$ext;

					// Use unlink() function to delete a file 
					if (!unlink($targetfile)) { 
						//echo ("$targetfile cannot be deleted due to an error"); 
					} 
					else { 
						//echo ("$targetfile has been deleted"); 
					} 
				//File deletion part ends 

					//echo $photo;
					
				$sql2 = "delete from guideavailability where gid = '$uid'";
				$result2=mysqli_query($connection,$sql2);
				if($result2){
					$_GLOBAL['avdone'] = 1;
				}else{
					$_GLOBAL['avdone'] = 0;
				}
					
				$sql3 = "delete from account where aid = '$aid'";
				$result3=mysqli_query($connection,$sql3);
				if($result3){
					$_GLOBAL['adone'] = 1;
				}else{
					$_GLOBAL['adone'] = 0;
				}
					
				if (($_GLOBAL['udone'] == 1) && ($_GLOBAL['adone']==1) && ($_GLOBAL['avdone']==1)){
					echo "<script> alert('Successfully Deleted') </script>";
					header("Location: user_nonhome_page.php");
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
	function checkbooking($connection,$uid){
		//echo $uid;
		$sql="select date from assign where guide='".$uid."'";
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

	
<?php include('../../public/html/guide_detele_project.html')?>
<?php require_once('guide_footer.php')?>