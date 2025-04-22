<?php
session_start();

if(empty($_SESSION['user_id'])){
    header("Location: logout.php");
}

else if($_SESSION['user_id'] && $_SESSION['otp_enabled'] == 1){
    echo $_SESSION['otp_enabled'];
    exit();
}

else if($_SESSION['role'] == 'Admin'){
    header("Location: admin_dashboard.php");
}

else if($_SESSION['role'] == 'Student'){
    header("Location: student_dashboard.php");
}
?>