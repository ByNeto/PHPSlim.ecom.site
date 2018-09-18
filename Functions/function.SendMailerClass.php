<?php
Class FunctionSendMailer{
	private static $SendMailerClient;
	private static $SendMailer;

/*@Param SendMailerClient @Functions SendMailerClient function.FunctionClass.php*/
public function SendMailerClient($MsgBody,$MsgSuccess,$AddAddressEmail,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToSubject,$AltBody){
	require_once('function.PhpMailerClass.php');
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Debugoutput = 'html';
		$mail->Host ="mail.autopec.com.br";
		$mail->Port = 587;
		$mail->SMTPSecure = 'TLS';
		$mail->SMTPAuth = true;
		$mail->Username = $UserName;
		$mail->Password = $Password;
		$mail->setFrom($SetFromMail,$SetFromName);
		//$mail->addReplyTo($AddReplyToMail,$AddReplyToSubject);
		$mail->addAddress($AddAddressEmail,$AddAddressName);
		//$mail->addAddress($AddReplyToMail,$AddReplyToSubject);
		$mail->Subject = $AddReplyToSubject;
		$mail->msgHTML($MsgBody);
		$mail->AltBody = $AltBody;
		//$mail->addAttachment('images/phpmailer_mini.png');
	if(!$mail->send()){
		print_r('<div class="alert alert-danger alert-dismissible text-shadow text-center fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Mailer Error: </strong>'.$mail->ErrorInfo.'</div>');
		$mail->SMTPDebug = 2;//Enable SMTP debugging 0 = off (for production use) - 1 = client messages - 2 = client and server messages
	}
	else{print_r($MsgSuccess);}
return @$return;
}

/*@Param SendMailer @Functions SendMailer function.FunctionClass.php*/
public function SendMailer($MsgBody,$MsgSuccess,$AddAddressEmail,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToMail,$AddReplyToSubject,$AltBody){
	require_once('function.PhpMailerClass.php');
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Debugoutput = 'html';
		$mail->Host ="mail.autopec.com.br";
		$mail->Port = 587;
		$mail->SMTPSecure = 'TLS';
		$mail->SMTPAuth = true;
		$mail->Username = $UserName;
		$mail->Password = $Password;
		$mail->setFrom($SetFromMail,$SetFromName);
		$mail->addReplyTo($AddReplyToMail,$AddReplyToSubject);
		$mail->addAddress($AddAddressEmail,$AddAddressName);
		$mail->addAddress($AddReplyToMail,$AddReplyToSubject);
		$mail->Subject = $AddReplyToSubject;
		$mail->msgHTML($MsgBody);
		$mail->AltBody = $AltBody;
		//$mail->addAttachment('images/phpmailer_mini.png');
	if(!$mail->send()){
		print_r('<div class="alert alert-danger alert-dismissible text-shadow text-center fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Mailer Error: </strong>'.$mail->ErrorInfo.'</div>');
		$mail->SMTPDebug = 2;//Enable SMTP debugging 0 = off (for production use) - 1 = client messages - 2 = client and server messages
	}
	else{print_r($MsgSuccess);}
return @$return;
}


}
?>