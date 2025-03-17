<?php

//Load Composer's autoloader
require 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

class Php_mailer
{
    function send($settings, $from, $to, $subject, $body, $is_html = false)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->SMTPAuth = true; // Enable SMTP authentication

            $mail->Host = $settings['smtp_host']; //config_item('smtp_host'); // 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->Username = $settings['smtp_username']; // config_item('smtp_user'); // 'user@example.com';                     //SMTP username
            $mail->Password = $settings['smtp_password']; // config_item('smtp_pass'); // 'secret';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = $settings['smtp_port']; // config_item('smtp_port'); // 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Recipients
            if (is_array($from)) {
                $mail->setFrom($from['email'], $from['alias']);
            } else {
                $mail->setFrom($from); // 'from@example.com', 'Mailer');
            }
            if (is_array($to)) {
                $mail->addAddress($to['email'], $to['alias']);
            } else {
                $mail->addAddress($to); // 'joe@example.net', 'Joe User'); // Add a recipient
            }
            // $mail->addAddress('ellen@example.com'); //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
            // Content
            if ($is_html) {
                $mail->isHTML(true); //Set email format to HTML
            }
            $mail->Subject = $subject; // 'Here is the subject';
            $mail->Body = $body; //'This is the HTML message body <b>in bold!</b>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            log_message('INFO', 'Message has been sent');
            //echo 'Message has been sent';
            return 'Message has been sent';
        } catch (Exception $e) {
            log_message('ERROR', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

function php_mailer_send($settings, $from, $to, $subject, $message, $is_html = false)
{
    $CI = &get_instance();
    $CI->load->library('php_mailer');
    $r = $CI->php_mailer->send($settings, $from, $to, $subject, $message, $is_html);
    return $r;
}
