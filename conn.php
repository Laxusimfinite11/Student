<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'studentmanagementsystem';

$conn = new mysqli($host, $user, $pass, $db, 3307);

if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}

?>
