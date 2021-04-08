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
	$aid=$_SESSION['aid'];
	//echo $aid;	
	$sql="select * from account where aid='".$aid."' ";
	//echo $sql;
	$result=mysqli_query($connection,$sql);
	while($row=$result->fetch_assoc()){
		$id=(string)$row['uid'];	
		$uname=(string)$row['username'];
	}
	
	$sql1="select * from user where uid='".$id."'";
	//echo $sql1;
	$result1=mysqli_query($connection,$sql1);
	while($row1=$result1->fetch_assoc()){       
        $name=$row1['name'];
        $address=$row1['address'];
        $email=$row1['email'];
        $telephone=$row1['telephone'];
    }
?>

<?php
		$_GLOBAL['accountdone']=0;
		$_GLOBAL['userdone']=0;
		
        if(isset($_GET['updatebtn'])){
            $name=$_GET['name'];
			//$uname=$_GET['uname'];
			$address=$_GET['address'];
			$email=$_GET['email'];
			$telephone=$_GET['telephone'];
			$_SESSION['username']=$uname;
            

				//update user table
				$sql2 = "UPDATE user SET name ='".$name."', address ='".$address."', email ='".$email."', telephone ='".$telephone."' where uid='".$id."'";   
				//echo $sql2;
				$result2 = mysqli_query($connection,$sql2);
				if($result2){
					$_GLOBAL['userdone']=1;
				}else{
					$_GLOBAL['userdone']=0;
				}
					
				if($_GLOBAL['userdone']==1){
					echo "<script> alert('Update is Successful') </script>";
					//header("Location: user_home_page.php");
				}else{
					//echo "failed";
				}          
		}
    ?>
<?php
	function checkusername($uname,$connection){
		$sql10="select * from account where username='".$uname."'";
		//echo $sql10;
		$result10=mysqli_query($connection,$sql10);
		if($row10=$result10->fetch_assoc()){
			return 0;
		}else{
			return 1;
		} 
	}
?>
<?php include('../../public/html/user_update_profile.html')?>
<?php require_once('footer_user.php')?>