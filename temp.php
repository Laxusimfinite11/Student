<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'vendor/autoload.php'; // Adjust the path if using Composer

// Recipient's phone number and carrier
$phone = "09669727839"; // Replace with the recipient's phone number
$carrier = "@smart.com.ph"; // Replace with the carrier's email-to-SMS gateway (Smart, Globe, etc.)

// The message you want to send
$message = "Hello! This is a test SMS from PHP.";

// Clean phone number (remove non-digits)
$cleanedPhone = preg_replace('/\D/', '', $phone);

// Validate phone number length (11 digits for Philippine numbers)
if (strlen($cleanedPhone) !== 11) {
    die("Invalid phone number format. Please enter an 11-digit number.");
}

// Construct the recipient's email address for the SMS gateway
$to = $cleanedPhone . $carrier;

// Set up PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'laxustaladro@gmail.com'; // Your Gmail address
    $mail->Password = 'qnjmwzichmfecyki'; // Gmail app-specific password (not your regular Gmail password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('laxustaladro@gmail.com', 'Lexus Taladro'); // Your email
    $mail->addAddress($to); // Recipient's SMS gateway address

    // Content
    $mail->isHTML(false); // Set plain-text email
    $mail->Subject = ''; // Subject is ignored in SMS
    $mail->Body    = $message;

    // Send email
    $mail->send();
    echo "✅ Message sent successfully!";
} catch (Exception $e) {
    echo "❌ Failed to send message. Error: {$mail->ErrorInfo}";
}
?>
