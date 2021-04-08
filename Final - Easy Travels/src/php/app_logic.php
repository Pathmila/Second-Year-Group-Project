<?php require_once('../../config/connect.php');?>


<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	$errors = [];
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
	if (isset($_POST['reset-password'])) {
		//$_SESSION['uname']=$_POST['uname'];
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		
		// ensure that the user exists on our system
		$query = "SELECT email FROM user WHERE email='$email'";
		$results = mysqli_query($connection, $query);
		//echo $query;

	if (mysqli_num_rows($results) <= 0) {
		echo "<script> alert('Sorry, no user exists on our system with that email') </script>";	
		header('location: login_page.php');
	}

	if (empty($email)) {
		array_push($errors, "Your email is required");
	}else if(mysqli_num_rows($results) <= 0) {
		array_push($errors, "Sorry, no user exists on our system with that email");
	}
	  // generate a unique random token of length 100
	  $token = bin2hex(random_bytes(50));

	  if (count($errors) == 0) {
		// store token in the password-reset database table against the user's email
		$sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
		$results = mysqli_query($connection, $sql);

		// Send email to user with the token in a link they can click on
/*		$to = $email;
		$subject = "Reset your password on easytravels.com";
		$msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
		$msg = wordwrap($msg,70);
		$headers = "From: ucsceasytravels@gmail.com";
		mail($to, $subject, $msg, $headers);
*/
		
        require '../../config/PHPMailer/src/Exception.php';
        require '../../config/PHPMailer/src/PHPMailer.php';
        require '../../config/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);

		try{
			$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

					$mail->isSMTP();                                            // Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					$mail->Username   = 'ucsceasytravels@gmail.com';                     // SMTP username
					//$mail->Password   = 'Easy1234';                               // SMTP password
					$mail->Password   = 'SYPucsc123';                               // SMTP password
					$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

					//Recipients
					$mail->setFrom('ucsceasytravels@gmail.com', 'Easy Travels');
					$mail->addAddress($email);     // Add a recipient            

					// Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = "User Password Reset";
					$msg = "Hi there, click on this <a href=\"http://localhost//Second%20Year%20Project/src/php/new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
					$msg = wordwrap($msg,70);
					
					$mail->Body    = $msg;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
					header('location: pending.php?email=' . $email);
					//echo 'Message has been sent';
		} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}    

				
			  }
		}
