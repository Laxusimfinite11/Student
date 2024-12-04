<?php
include('conn.php');


$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';




$name = mysqli_real_escape_string($conn, $name);
$description = mysqli_real_escape_string($conn, $description);


$query = "INSERT INTO subject (name, description) 
          VALUES ('$name', '$description')";


if (mysqli_query($conn, $query)) {
    $message = "Subject Registered Successfully!";
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subject Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Subject Registration</h1>
        <div class="alert <?php echo (isset($message) && strpos($message, 'Successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="subject_crud.php" class="btn btn-primary">Back to Subject List</a>
    </div>
</body>
</html>
