<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $input_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $input_password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT user_id, password, first_name, last_name, role FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $input_email);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($id, $db_password, $first_name, $last_name, $role);
        $stmt->fetch();

        // Validate password
        if ($input_password == $db_password) { // You may want to hash and verify passwords for better security
            session_start();

            // Store user details in session
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $input_email;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['role'] = $role;

            // Redirect to dashboard
            header("Location: index.php");
            exit;
        } else {
            echo "No such credentials found.";
        }
    } else {
        echo "No such credentials found.";
    }

    $stmt->close();
}

$conn->close();
?>
