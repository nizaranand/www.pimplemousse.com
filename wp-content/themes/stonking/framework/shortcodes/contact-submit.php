<?php

/**
 * Contact Form Submit
 */
//Check to see if the honeypot captcha field was filled in
global $emailSent;
if (isset($_POST['checking']) && trim($_POST['checking']) !== '') {
    $captchaError = true;
} else {

    //Check to make sure that the name field is not empty
	$name = '';
    if (isset($_POST['ContactName']) && trim($_POST['ContactName']) === '') {
        $nameError = 'You forgot to enter your name.';
        $hasError = true;
    } else if (isset($_POST['ContactName'])) {
        $name = trim($_POST['ContactName']);
    }

    //Check to make sure sure that a valid email address is submitted
	$email = '';
    if (isset($_POST['ContactEmail']) && trim($_POST['ContactEmail']) === '') {
        $emailError = 'You forgot to enter your email address.';
        $hasError = true;
    } else if (isset($_POST['ContactEmail']) && !eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['ContactEmail']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else if(isset($_POST['ContactEmail'])){
        $email = trim($_POST['ContactEmail']);
    }

    //Check to make sure comments were entered
	$comments = '';
    if (isset($_POST['ContactComment']) && trim($_POST['ContactComment']) === '') {
        $commentError = 'You forgot to enter your comments.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes') && isset($_POST['ContactComment'])) {
            $comments = stripslashes(trim($_POST['ContactComment']));
        } else if (isset($_POST['ContactComment'])) {
            $comments = trim($_POST['ContactComment']);
        }
    }

    //If there is no error, send the email
    if (!isset($hasError) && isset($_POST['ContactName']) && isset($_POST['ContactEmail'])) {

		$emailTo = '';
        $subject = '';
        $sendCopy = '';
        $body = "";
        $headers = '';
		if(isset($_POST['emailAddress']))
			$emailTo = $_POST['emailAddress'];
		$subject = 'Contact Form Submission from ' . $name;
        if(isset($_POST['sendCopy']))
			$sendCopy = trim($_POST['sendCopy']);
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: My Site <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $subject, $body, $headers);

        if ($sendCopy == true) {
            $subject = 'You emailed Your Name';
            $headers = 'From: Your Name <noreply@somedomain.com>';
            mail($email, $subject, $body, $headers);
        }

        $emailSent = true;
    }
}
?>