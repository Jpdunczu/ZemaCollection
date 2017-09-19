<?php
include('Mail.php');
require 'PHPMailerAutoload.php';

function send_email($to, $from, $subject, $body, $is_body_html = false) {
	/*
	$smtp = array();
	$smtp['host'] = 'a2plcpnl0870.prod.iad2.secureserver.net';
	$smtp['port'] = '465';
	$smtp['auth'] = true;
	$smtp['username'] = 'customer_care@zemacollection.com';
	$smtp['password'] = '@hBamHung108';
	
	$mailer =& Mail::factory('smtp', $smtp);
	
	// Add the email address to the list of all recipients
	$recipients = array();
	$recipients[] = $to;
	
	// Set the headers
	$headers = array();
	$headers['From'] = $from;
	$headers['To'] = $to;
	$headers['Subject'] = $subject;
	
	// Send the email
	$mailer->send($recipients, $headers, $body);
	*/
	

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'a2plcpnl0870.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'customer_care@zemacollection.com';                 // SMTP username
	$mail->Password = '@hBamHung108';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->setFrom('customer_care@zemacollection.com', 'ZC Customer Concerns');
	// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');

	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(false);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
}
?>