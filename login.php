<?php
include('conn.php');
session_start();

if (isset($_SESSION['first_name'])) {
    header("Location: index.php");
    exit();
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
<body style="background-color: #024059;">
<div class="container-fluid">
    <div class="centered-container">
        <div class="login-container">
            <h2 class="text-center mb-4">Login</h2>
            <form id="loginForm" action="code.php" method="post" autocomplete="on">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    <div id="passwordHelp" class="form-text text-danger"></div> <!-- Password error message -->
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
// Password validation
document.getElementById('loginForm').addEventListener('submit', function(event) {
    const password = document.getElementById('password').value;
    const passwordHelp = document.getElementById('passwordHelp');

    // Clear any previous message
    passwordHelp.textContent = '';

    if (password.length < 8) {
        event.preventDefault(); // Stop the form from submitting
        passwordHelp.textContent = 'Password must be at least 8 characters long.';
    }
});
</script>

</body>
</html>
