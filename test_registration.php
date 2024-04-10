<?php

/*
  Plugin Name: Test submit
  Plugin URI: 
  Description: 
  Version:
  Author: BAFFER
  Author URI: 
 */

function test_submit_function() {
    if (isset($_POST['submit'])) {
        submit_validation(
        $_POST['email'],
        $_POST['fname'],
        $_POST['nickname'],
        $_POST['message']
		);
		
        global $email, $first_name, $nickname, $message, $subject;
        $email 		= 	sanitize_email($_POST['email']);
        $first_name = 	sanitize_text_field($_POST['fname']);
        $subject = 	sanitize_text_field($_POST['subject']);
        
        $nickname 	= 	sanitize_text_field($_POST['nickname']);
        $message 		= 	esc_textarea($_POST['message']);

        complete_submit(
        $email,
        $subject,
        $first_name,
        $nickname,
        $message
		);
    }

    $email = '';
    $first_name = '';
    $subject = '';
    $nickname = '';
    $message = '';

    submit_form(
        $email,
        $first_name,
        $subject,
        $nickname,
        $message
		);
}

function submit_form ($email, $first_name, $nickname, $message,$subject) {
    echo '
    <style>
	div {
		margin-bottom:2px;
	}
	
	input{
		margin-bottom:4px;
	}
	</style>
	';

    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">

    <div>
	    <label for="firstname">First Name</label>
	    <input type="text" name="fname" value="' . (isset($_POST['fname']) ? $first_name : null) . '">
	</div>

    <div>
	    <label for="nickname">Last Name</label>
	    <input type="text" name="nickname" value="' . (isset($_POST['nickname']) ? $nickname : null) . '">
	</div>
	
	<div>
	    <label for="email">Email <strong>*</strong></label>
	    <input type="text" name="email" value="' . (isset($_POST['email']) ? $email : null) . '">
	</div>

    <div>
	    <label for="subject">Subject</label>
	    <input type="text" name="subject" value="' . (isset($_POST['subject']) ? $subject : null) . '">
	</div>

	<div>
	    <label for="message">Message</label>
	    <textarea name="message">' . (isset($_POST['message']) ? $message : null) . '</textarea>
	</div>
	<input type="submit" name="submit" value="Register"/>
	</form>
	';
}

function submit_validation( $email, $first_name, $nickname, $message)  {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if ( !is_email( $email ) ) {
        $reg_errors->add('email_invalid', 'Email is not valid');
    }

    if ( email_exists( $email ) ) {
        $reg_errors->add('email', 'Email Already in use');
    }

    if ( is_wp_error( $reg_errors ) ) {

        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';

            echo '</div>';
        }
    }
}

function complete_submit() {
    global $reg_errors, $email, $first_name, $nickname, $message, $subject;
    if ( count($reg_errors->get_error_messages()) < 1 ) {
        $userdata = array(
        'user_email' 	=> 	$email,
        'first_name' 	=> 	$first_name,
        'subject' 	=> 	$subject,
        'nickname' 		=> 	$nickname,
        'description' 	=> 	$message,
		);
        echo 'Your message has been sent!';   
	}
}

// Register a new shortcode: [cr_test_submit]
add_shortcode('cr_test_submit', 'test_submit_shortcode');

// The callback function that will replace [book]
function test_submit_shortcode() {
    ob_start();
    test_submit_function();
    return ob_get_clean();
}
