<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include ('conn.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_SESSION['email'];
    $user_no = $_SESSION['mobile_number'];
    $user_id = $_SESSION['user_id'];

    # Generate OTP Code
    $otp = random_int(100000, 999999);
    $expire_at = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    $_SESSION['otp'] = $otp;

    # Store OTP code in the database
    $stmt = $conn->prepare("INSERT INTO otp(user_id, otp_code, expiry_time) VALUES(?, ?, ?)");
    $stmt->bind_param("sss", $user_id, $otp, $expire_at);
    $stmt->execute();
    $stmt->close();

    # Send OTP code to email
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();  // Correct the typo here
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'laxustaladro@gmail.com'; // Your Gmail email
        $mail->Password = "qnjmwzichmfecyki";  // Your Gmail password or App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom("laxustaladro@gmail.com", 'Student');
        $mail->addAddress($user_email);  // Address to send the OTP
        $mail->Subject = 'Your OTP Code: ' . $otp;
        $mail->Body = "Your OTP code is: " . $otp . ". It will expire in 5 minutes.";

        $mail->send();  // Attempt to send the email
        echo "OTP sent successfully.";

    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Detailed error
    }
}

?>