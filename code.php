<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $input_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $input_email);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_password);
        $stmt->fetch();

        if ($input_password == $db_password) {
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $input_email;

            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
}

$conn->close();
?>
