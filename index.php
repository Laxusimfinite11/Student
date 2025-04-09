<?php
session_start();

if(empty($_SESSION['user_id'])){
    header("Location: logout.php");
}

else if($_SESSION['user_id']){
    header("Location: authenticate.php");
}

else if($_SESSION['role'] == 'Admin'){
    header("Location: admin_dashboard.php");
}

else if($_SESSION['role'] == 'Student'){
    header("Location: student_dashboard.php");
}
?>