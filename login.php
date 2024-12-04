<?php
include ('conn.php');
session_start();

if(empty($_SESSION['first_name'])){
    include ('logout.php');
}

else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="bootstrap/css/login.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.rtl.min.css">
</head>
<body style="background-color: #024059 ;">
<div class="container-fluid">
    <div class="centered-container">
        <div class="login-container">
            <h2 class="text-center mb-4">Login</h2>
            <form action="code.php" method="post" autocomplete="on">
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email"  name="email" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
</div>
</body>
</html>