<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $input_password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT user_id, password, first_name, last_name, role FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $input_email);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_password, $first_name, $last_name, $role);
        $stmt->fetch();

        if (password_verify($input_password, $db_password)) {
            session_start();

            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $input_email;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['role'] = $role;

            header("Location: index.php");
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>
