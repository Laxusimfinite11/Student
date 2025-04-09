<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure PHPMailer is installed via Composer

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                 // Use SMTP
    $mail->Host       = 'smtp.gmail.com';            // Gmail SMTP server
    $mail->SMTPAuth   = true;                        // Enable SMTP authentication
    $mail->Username   = 'laxustaladro@gmail.com'; // Your email
    $mail->Password   = 'qnjmwzichmfecyki';       //Replace with your real password or App Password
    $mail->SMTPSecure = 'tls';                       // Enable TLS encryption
    $mail->Port       = 587;                         // TCP port to connect to

    // Recipients
    $mail->setFrom('laxustaladro@gmail.com', 'Lexus from PSU');
    $mail->addAddress('202280017@psu.palawan.edu.ph', 'Lexus Taladro');

    // Content
    $mail->isHTML(true);                             // Set email format to HTML
    $mail->Subject = 'Test Email from Lexus';
    $mail->Body    = '<strong>Hello Lexus,</strong><br>This is a test email sent using PHPMailer. <br><br>Blessings! 🙏';

    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
