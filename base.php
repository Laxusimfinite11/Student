<?php
include ('conn.php');
session_start();

if(empty($_SESSION['first_name'])){
    header("Location: logout.php");
}

$user_first = $_SESSION['first_name'];
$user_last = $_SESSION['last_name'];
$user_role = $_SESSION['role'];

$query = "SELECT user_id, first_name, mobile_number, last_name, email, password, role FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/dashboard.css">
</head>
<body style="background-color: #024059;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h1>Welcome!</h1>
            <h1><?php echo htmlspecialchars($user_role) . ":"; ?> <?php echo htmlspecialchars($user_first); ?> <?php echo htmlspecialchars($user_last); ?></h1>
        </a>
        <div class="navbar-nav ms-auto">
            <a href="index.php" class="btn btn-primary me-2">Home</a>
            <?php
                if ($user_role == 'Admin'){
                    echo '<a href="student_crud.php" class="btn btn-primary me-2">Students</a><a href="admin_crud.php" class="btn btn-primary me-2">Admins</a><a href="subject_crud.php" class="btn btn-primary me-2">Subjects</a>';
                }

                else{
                    // dito ilagay yung tabs ng sa student dashboard
                    echo '';
                }
            ?>
            <a href="logout.php" class="btn btn-log-out">Log Out</a>
        </div>
    </div>
</nav>


    
</body>