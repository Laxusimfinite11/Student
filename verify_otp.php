<?php 
include 'conn.php';
include 'log_audit.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = $_POST['otp'];
    $user_id = $_SESSION['user_id'];

    if(isset($_SESSION['otp']) && $otp == $_SESSION['otp']) {
        $_SESSION['otp_verified'] = true;
        logActivity($conn, $user_id, "OTP Verified", "User successfully verified the one-time password (OTP).");
        header("Location: admin_dashboard.php", true, 303);
        exit;
    } else {
        // Set error message in session to display later
        $_SESSION['otp_error'] = 'Invalid OTP! Please try again.';
        // Redirect back to authenticate.php
        logActivity($conn, $user_id, "OTP Verification Failed", "User entered an incorrect or expired OTP.");
        header("Location: authenticate.php");
        exit;
    }
}
?>
