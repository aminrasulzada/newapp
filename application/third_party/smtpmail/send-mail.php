<?php
function send_email($to_email, $subject, $message) {
	require_once('class.phpmailer.php');
	
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->SMTPDebug = false;                     
							
	$mail->SMTPAuth = true;                 
	$mail->SMTPSecure = "ssl";                 
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;                   
	$mail->Username = "mailoweb2017@gmail.com";
	$mail->Password = "Oakyweb.123";
	
	
	//$mail->AddReplyTo('rvtesting2016@gmail.com', 'OW');
	//$mail->SetFrom("avinash@oakyweb.com", 'Test Kumar');
	
	$mail->AddAddress($to_email);
	$mail->Subject = $subject;
	$mail->MsgHTML($message);

	if(!$mail->Send()) {
	  return 0;
	} else {
	  return 1;
	}
}

var_dump(send_email('care@Solaj.in', 'Email Test', '<b>For solaj testing.</b>'));
var_dump(send_email('info@Solaj.in', 'Email Test', '<b>For solaj testing.</b>'));