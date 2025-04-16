<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include ('conn.php');
include 'log_audit.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_SESSION['email'];
    $user_no = $_SESSION['mobile_number'];
    $user_id = $_SESSION['user_id'];


    if ($_POST['userOtpMethod'] == 'email') {
        $gen = otpGenerator($conn, $user_id);
        $_SESSION['otp'] = $gen['otp'];
        
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP(); 
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'laxustaladro@gmail.com'; // Your Gmail email
            $mail->Password = "qnjmwzichmfecyki";  // Your Gmail password or App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom("laxustaladro@gmail.com", 'Student');
            $mail->addAddress($user_email);  // Address to send the OTP
            $mail->Subject = 'Your OTP Code: ' . $gen['otp'];
            $mail->Body = "Your OTP code is: " . $gen['otp'] . ". It will expire in 5 minutes.";

            $mail->send();  // Attempt to send the email
            logActivity($conn, $id, "OTP Request", "User requested a one-time password (OTP) for authentication."); 
            echo "OTP sent successfully.";


        } catch (Exception $e) {
            logActivity($conn, $id, "OTP Request Failed", "User failed to request or verify the one-time password (OTP).");
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Detailed error
        }

    } else if ($_POST['userOtpMethod'] == 'txt') {

    };

}

# OTP Generator
function otpGenerator($conn, $userID) {
    $otp = random_int(100000, 999999);
    $expire_at = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    # Store OTP code in the database
    $stmt = $conn->prepare("INSERT INTO otp(user_id, otp_code, expiry_time) VALUES(?, ?, ?)");
    $stmt->bind_param("sss", $userID, $otp, $expire_at);
    $stmt->execute();
    $stmt->close();

    return [
        'otp' => $otp,
        'expire' => $expire_at
    ];
}
?>