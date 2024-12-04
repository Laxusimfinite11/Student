<?php
include('conn.php');


$firstname = $_POST['adminName'] ?? '';
$lastname = $_POST['adminLastName'] ?? '';
$email = $_POST['adminEmail'] ?? '';
$mobile_number = $_POST['adminMobileNumber'] ?? '';
$password = $_POST['adminPassword'] ?? '';



$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$email = mysqli_real_escape_string($conn, $email);
$mobile_number = mysqli_real_escape_string($conn, $mobile_number);
$password = mysqli_real_escape_string($conn, $password);


$query = "INSERT INTO users (first_name, last_name, email, mobile_number, password, role) 
          VALUES ('$firstname', '$lastname', '$email', '$mobile_number', '$password', 'Admin')";


if (mysqli_query($conn, $query)) {
    $message = "Admin Registered Successfully!";
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Admin Registration</h1>
        <div class="alert <?php echo (isset($message) && strpos($message, 'Successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="admin_crud.php" class="btn btn-primary">Back to Admin List</a>
    </div>
</body>
</html>
