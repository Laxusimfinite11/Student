<?php
include('conn.php');


$firstname = $_POST['studentName'] ?? '';
$lastname = $_POST['studentLastName'] ?? '';
$email = $_POST['studentEmail'] ?? '';
$mobile_number = $_POST['studentMobileNumber'] ?? '';
$password = $_POST['studentPassword'] ?? '';



$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$email = mysqli_real_escape_string($conn, $email);
$mobile_number = mysqli_real_escape_string($conn, $mobile_number);
$password = mysqli_real_escape_string($conn, $password);


$query = "INSERT INTO users (first_name, last_name, email, mobile_number, password, role) 
          VALUES ('$firstname', '$lastname', '$email', '$mobile_number', '$password', 'Student')";


if (mysqli_query($conn, $query)) {
    $message = "Student Registered Successfully!";
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Student Registration</h1>
        <div class="alert <?php echo (isset($message) && strpos($message, 'Successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="student_crud.php" class="btn btn-primary">Back to Student List</a>
    </div>
</body>
</html>