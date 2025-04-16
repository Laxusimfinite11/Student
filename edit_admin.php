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

# Fetch current data from DB on student
$sql = "SELECT first_name, last_name, mobile_number, 
    email, password FROM users WHERE user_id = ?";

$stmt = $conn->prepare(($sql));
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$current = $result->fetch_assoc();
$stmt->close();

$changes = [];

# Checking if there are any changes in the information of the student
if ($current['first_name'] !== $first_name) $changes[] = "First Name";
if ($current['last_name'] !== $last_name) $changes[] = "Last Name";
if ($current['email'] !== $email) $changes[] = "Email";
if ($current['mobile_number'] !== $mobile_number) $changes[] = "Mobile Number";

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
              role = 'Admin'";

if (!empty($password)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query .= ", password = '$password'";
}

$query .= " WHERE user_id = '$user_id'";

if (mysqli_query($conn, $query)) {
    if (mysqli_affected_rows($conn) > 0) {
        $message = "Admin Updated Successfully!";
        $fields_changed = implode(", ", $changes);
        logActivity($conn, $users_id, "Edit Admin", 
        "Admin account for $first_name $last_name was updated by $admin_name. Fields changed: $fields_changed.");
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
    <title>Admin Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Admin Update</h1>
        <div class="alert <?php echo (isset($message) && strpos($message, 'Successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="admin_crud.php" class="btn btn-primary">Back to admin List</a>
    </div>
</body>
</html>
