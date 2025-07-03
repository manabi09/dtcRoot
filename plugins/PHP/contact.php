<?php
use PHPMailer\PhpMailer\PHPMailer;
use PHPMailer\PhpMailer\Exception;
use PHPMailer\phpMailer\SMTP;

// If using Composer autoload
require 'html/PHPMailer/PhpMailer/Exception.php';
require 'html/PHPMailer/PhpMailer/PHPMailer.php';
require 'html/PHPMailer/PhpMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Mailtrap SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'abc7ecbaded17b';
    $mail->Password   = '94f13403a576ae';
    $mail->Port       = 2525;

    // Sender & recipient
    $mail->setFrom('sadhukhanmisti987@gmail.com', 'Website Contact');
    $mail->addAddress('sadhukhanmisti987@gmail.com'); // your inbox address

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "
        <b>Name:</b> {$_POST['name']}<br>
        <b>Email:</b> {$_POST['email']}<br>
        <b>Message:</b><br>{$_POST['message']}
    ";

    $mail->send();
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
