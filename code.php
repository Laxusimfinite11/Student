<?php
include('conn.php');
include('log_audit.php');
session_start();

if (isset($_SESSION['first_name'])) {
    header("Location: index.php");
    exit;
}

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $input_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password, first_name, last_name, role, mobile_number, otp_enabled FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $input_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_password, $first_name, $last_name, $role, $no, $otp_enabled);
        $stmt->fetch();

        if (password_verify($input_password, $db_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $input_email;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['role'] = $role;
            $_SESSION['mobile_number'] = $no;
            $_SESSION['otp_enabled'] = $otp_enabled;

            logActivity($conn, $id, "Login", "User successfully logged in.");

            header("Location: index.php");
            exit;
               
        } else {
            $error_message = "Invalid email or password.";
            logActivity($conn, 0, "Failed Login", "Invalid login attempt using email: $input_email");

        }
    } else {
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
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

            <?php
            if (!empty($error_message)) {
                echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
            }
            ?>

            <form action="" method="post" autocomplete="on">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username" required>
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
