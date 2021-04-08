<?php require_once('../../config/connect.php');?>


<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	$errors = [];
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
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
		$mail->Password   = 'SYPucsc123';                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('ucsceasytravels@gmail.com', 'Easy Travels');
		$mail->addAddress($email);     // Add a recipient                       

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = "Easy Travels Reservation - User";
		$msg = "Hi there, You have a reservation on $date. You booked $pack for your journey. Please view your booking details page for more details. ";
		$msg = wordwrap($msg,70);
					
		$mail->Body    = $msg;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}    
?>
