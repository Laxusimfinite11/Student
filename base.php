<?php
include ('conn.php');
session_start();

if(empty($_SESSION['first_name'])){
    header("Location: logout.php");
}

$user_first = $_SESSION['first_name'];
$user_last = $_SESSION['last_name'];
$user_role = $_SESSION['role'];

$query = "SELECT user_id, first_name, mobile_number, last_name, email, password, role FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/dashboard.css">
</head>
<body style="background-color: #024059;">
</body>