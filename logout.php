<?php
include ('conn.php');
include 'log_audit.php';
session_start();

// Check if user_id is set in session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    

    // Log activity
    logActivity($conn, $user_id, "Logout", "User successfully logged out.");
} else {
    // If user_id is not set, redirect to login page
    header("Location: login.php");
    exit;
}

session_unset();
session_destroy();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

header("Location: login.php");
exit;
?>
