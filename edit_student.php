<?php
include('conn.php');
include('log_audit.php');
session_start();
$users_id = $_SESSION['user_id'];
$admin_name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];

$user_id = $_POST['user_id'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile_number = $_POST['mobile_number'] ?? '';
$password = $_POST['password'] ?? '';

$user_id = mysqli_real_escape_string($conn, $user_id);
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_real_escape_string($conn, $last_name);
$email = mysqli_real_escape_string($conn, $email);
$mobile_number = mysqli_real_escape_string($conn, $mobile_number);

$query = "UPDATE users 
          SET first_name = '$first_name',
              last_name = '$last_name',
              email = '$email',
              mobile_number = '$mobile_number',
              role = 'Student'";

if (!empty($password)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query .= ", password = '$password'";
}

$query .= " WHERE user_id = '$user_id'";

if (mysqli_query($conn, $query)) {
    if (mysqli_affected_rows($conn) > 0) {
        $message = "Student Updated Successfully!";
    } else {
        $message = "No changes made. Please check the input.";
    }
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Student Update</h1>
        <div class="alert <?php echo (isset($message) && strpos($message, 'Successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="student_crud.php" class="btn btn-primary">Back to Student List</a>
    </div>
</body>
</html>
