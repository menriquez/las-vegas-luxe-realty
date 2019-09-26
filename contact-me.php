<?php

if ($_REQUEST['frompage'] == "landing") {

	$reply=[];

	$reply['data']=true;
	// Check for empty fields
	if (empty($_REQUEST['fname']) || empty($_REQUEST['femail']) || empty($_REQUEST['fmsg']) || !filter_var($_REQUEST['femail'], FILTER_VALIDATE_EMAIL)) {

		$reply['data']=false;
		$reply['status']="missing fields or bad email - try again";

		$json_reply=json_encode($reply);
		return $json_reply;
	}

	$fname=trim($_REQUEST['fname']);
	$femail=trim($_REQUEST['femail']);
	$fmsg=trim($_REQUEST['fmsg']);

// Create the email and send the message
	$to='SaharSaljougui@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$to='markdatavu@gmail.com';
	$email_subject="Website Landing Page Contact Form:  $fname";
	$email_body="You have received a new message from your website contact form.\n\nContact name:$fname\nContact email:$femail\nmessage:\n$fmsg";
	$headers="From: noreply@lasvegasluxerealty.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers.="Reply-To: $femail";
	mail($to, $email_subject, $email_body, $headers);

	$reply['data']=true;
	$reply['status']="looking good - mail sent!";
	$json_reply=json_encode($reply);
	return $json_reply;
}
