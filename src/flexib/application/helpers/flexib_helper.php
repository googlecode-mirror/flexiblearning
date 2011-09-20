<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('send_mail')) {
	function send_email_from_admin($recipientEmail, $recipientFullName, $subject, $message) {
		$CI =& get_instance();

		error_reporting(E_ALL);
		require_once('lib/PHPMailer_v5.1/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->CharSet = "utf-8"; // telling the class to use SMTP
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth = true;                  // enable SMTP authentication
		$mail->SMTPSecure = $CI->config->item('host_smtp_secure'); // sets the prefix to the servier
		$mail->Host = $CI->config->item('host_email_server');      // sets GMAIL as the SMTP server
		$mail->Port = $CI->config->item('host_smtp_port');                   // set the SMTP port for the GMAIL server
		$mail->Username = $CI->config->item('host_username_email');  // GMAIL username
		$mail->Password = $CI->config->item('host_password_email');            // GMAIL password

		$mail->SetFrom($CI->config->item('host_username_email'),
		$CI->config->item('host_email_fullname'));

		$mail->Subject = $subject;

		$mail->MsgHTML($message);

		$mail->AddAddress($recipientEmail, $recipientFullName);

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	}
}