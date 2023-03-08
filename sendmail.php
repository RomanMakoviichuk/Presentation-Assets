<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//Who is the letter from?
	$mail->setFrom('admin@examplesite.fun', 'Admin');
	//To whom to send
	$mail->addAddress('puzzlemetalcore@gmail.com');
	//The subject of the letter
	$mail->Subject = 'new message';


	//body letter
	$body = '<h1>new request</h1>';
	
	if(trim(!empty($_POST['CompanyName']))){
		$body.='<p><strong>Company Name:</strong> '.$_POST['CompanyName'].'</p>';
	}
	if(trim(!empty($_POST['FirstName']))){
		$body.='<p><strong>First Name:</strong> '.$_POST['FirstName'].'</p>';
	}
	if(trim(!empty($_POST['LastName']))){
		$body.='<p><strong>Last Name:</strong> '.$_POST['LastName'].'</p>';
	}
	
	if(trim(!empty($_POST['Phone']))){
		$body.='<p><strong>Phone:</strong> '.$_POST['Phone'].'</p>';
	}
	if(trim(!empty($_POST['Email']))){
		$body.='<p><strong>Email:</strong> '.$_POST['Email'].'</p>';
	}
	

	$mail->Body = $body;

	//sending
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Data sending!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>