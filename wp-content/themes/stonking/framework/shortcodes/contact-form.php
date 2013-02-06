<?php

// Contact Form
global $emailSent;
if (isset($_POST['submittedContact'])) {
        require_once(TEMPLATEPATH . "/framework/shortcodes/contact-submit.php");
    }
function contact_form($email) {

    $email_adress_reciever = $email != "" ? $email : get_option('admin_email');
	$out = '';
    //If the form is submitted
    
	global $emailSent;
    if (isset($emailSent) && $emailSent == true) {

        $out .= '<a name="contact_"></a>';
        $out .= '<p class="thanks"><strong>Thanks!</strong> Your email was successfully sent.</p>';
    } else {
		
        if (isset($captchaError)) {
            $out .= '<a name="contact_"></a>';
            $out .= '<p class="error">There was an error submitting the form.<p>';
        }
        $out .= '<a name="contact_"></a>';
        $out .= '<form action="#" class="cmxform" id="CommentForm" method="post"><fieldset><div class="overlabel-wrapper">';
        $out .= '<label class="overlabel overlabel-apply" for="ContactName">Name </label><input type="text" name="ContactName" id="ContactName" value="';

        if (isset($_POST['ContactName'])) {
            $out .= $_POST['ContactName'];
        }
        $out .= '"';
        $out .= ' class="textInput required';

        if (isset($emailError) && $emailError != '') {
            $out .= ' inputError';
        }
        $out .= '"';
        $out .= ' /></div>';

        $out .= '<div class="overlabel-wrapper"><label class="overlabel overlabel-apply" for="ContactEmail">Email </label><input type="text" name="ContactEmail" id="ContactEmail" value="';

        if (isset($_POST['ContactEmail'])) {
            $out .= $_POST['ContactEmail'];
        }
        $out .= '"';
        $out .= ' class="textInput required email';

        if (isset($emailError) && $emailError != '') {
            $out .= ' inputError';
        }
        $out .= '"';
        $out .= ' /></div>';

        $out .= '<div class="overlabel-wrapper"><label for="ContactComment overlabel-apply" class="overlabel">Comments</label><br/><textarea name="ContactComment" id="ContactComment" class="textInput required';

        if (isset($commentError) && $commentError != '') {
            $out .= ' inputError';
        }
        $out .= '" rows="10" cols="40">';

        if (isset($_POST['ContactComment'])) {
            if (function_exists('stripslashes')) {
                $out .= stripslashes($_POST['ContactComment']);
            } else {
                $out .= $_POST['ContactComment'];
            }
        }
        $out .= '</textarea></div>';



        //$out .= '<p class="loadingImg"></p>';
        $out .= '<div class="overlabel-wrapper"><button name="submittedContact" type="submit"><span>Send now</span></button><label id="loader" style="display:none;"><img src="'.get_template_directory_uri().'/images/ajax-loader.gif" alt="Loading..." id="LoadingGraphic" /></label></div>';
        $out .= '<p class="screenReader"><input id="submitUrl" type="hidden" name="submitUrl" value="' . get_template_directory_uri() . '/includes/contact-submit.php" /></p>';
        $out .= '<p class="screenReader"><input id="emailAddress" type="hidden" name="emailAddress" value="' . $email_adress_reciever . '" /></p>';

        $out .= '</form>';
    }
    return $out;
}

?>