<?php
	$to_email = "jkereo@gmail.com";
	$subject = "Simple Email Test via PHP";
	$body = "Hi,nunuk This is test email send by PHP Script";
	$headers = "From: sender\'s email";

	if (mail($to_email, $subject, $body, $headers)) {
	    echo "Email successfully sent to $to_email...";
	} else {
	    echo "Email sending failed...";
	}
?>
