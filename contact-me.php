<?php

if ($_REQUEST['frompage'] == "landing" ||
	$_REQUEST['frompage'] == "detail") {

	$reply=[];

	$reply['data']=true;

	// Check for empty fields
	if (empty($_REQUEST['fname']) || empty($_REQUEST['femail']) || empty($_REQUEST['fmsg']) || !filter_var($_REQUEST['femail'], FILTER_VALIDATE_EMAIL)) {

		$reply['data']=false;
		$reply['status']="missing fields or bad email - try again";

		$json_reply=json_encode($reply);
		header('Content-type: application/json');
		return $json_reply;
	}

	$fname=trim($_REQUEST['fname']);
	$femail=trim($_REQUEST['femail']);
	$fmsg=trim($_REQUEST['fmsg']);

	$email_subject="IMPORTANT! Website LANDING Page Contact Form:  $fname";
	if ($_REQUEST['frompage'] == "detail") {
		$email_subject="IMPORTANT! Website DETAIL Page Contact Form:  $fname";
	}

// Create the email and send the message
	$to='SaharSaljougui@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.

	$email_body="You have received a new message from your website contact form.\n\nContact name:$fname\nContact email:$femail\nmessage:\n$fmsg";
	$headers="From: noreply@lasvegasluxerealty.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers.="Reply-To: $femail";
	mail($to, $email_subject, $email_body, $headers);

	$reply['data']=true;
	$reply['status']="ok";
	$json_reply=json_encode($reply);
	header('Content-type: application/json');
	return $json_reply;
}
else {
	$reply['data']=false;
	$reply['status']="error";
	$json_reply=json_encode($reply);
	header('Content-type: application/json');
	return $json_reply;
}