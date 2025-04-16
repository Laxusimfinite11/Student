<?php
include ('conn.php');
session_start();
$user_email = $_SESSION['email'];
print($user_email);

?>