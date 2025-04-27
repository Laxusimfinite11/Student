<?php
session_start();

if (empty($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit();
}

if ($_SESSION['user_id'] && $_SESSION['otp_enabled'] == 1) {
    header("Location: authenticate.php");
    exit();
}

if ($_SESSION['role'] == 'Admin') {
    header("Location: admin_dashboard.php");
    exit();
}

if ($_SESSION['role'] == 'Student') {
    header("Location: student_dashboard.php");
    exit();
}
?>
