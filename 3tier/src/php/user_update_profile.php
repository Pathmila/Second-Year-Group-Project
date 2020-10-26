<?php require_once('connect.php');
    session_start();
    if($_SESSION['loggedin']!=1){
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
			$uname=$_GET['uname'];
			$address=$_GET['address'];
			$email=$_GET['email'];
			$telephone=$_GET['telephone'];
			$_SESSION['username']=$uname;
            

			//update account table
			$sql1 = "UPDATE account SET username ='".$uname."' where uid='".$id."'"; 
			//echo $sql1;
            $result1 = mysqli_query($connection,$sql1);
			if($result1){
				$_GLOBAL['accountdone']=1;
			}else{
				$_GLOBAL['accountdone']=0;
			}

			//update user table
            $sql2 = "UPDATE user SET name ='".$name."', address ='".$address."', email ='".$email."', telephone ='".$telephone."' where uid='".$id."'";   
            //echo $sql2;
			$result2 = mysqli_query($connection,$sql2);
            if($result2){
					$_GLOBAL['userdone']=1;
				}else{
					$_GLOBAL['userdone']=0;
				}
				
                if(($_GLOBAL['accountdone']==1) && ($_GLOBAL['userdone']==1)){
                    echo "<script> alert('Submition is Sucessfull') </script>";
					header("Location: user_home_page.php");
                }else{
                    //echo "failed";
                }          
        }        
    ?>
<?php include('../../public/html/user_update_profile.html')?>
<?php require_once('footer.php')?>