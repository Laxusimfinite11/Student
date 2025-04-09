<?php 
include 'conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = $_POST['otp'];

    if(isset($_SESSION['otp']) && $otp == $_SESSION['otp']) {
        $_SESSION['otp_verified'] = true;
        header("Location: admin_dashboard.php", true, 303);
        exit;

    } else {   
       echo 'invalid';

    }

}

?>