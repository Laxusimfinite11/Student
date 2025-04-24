<?php
include ('conn.php');

session_start();

// Check if the login is succesful to avoid visiting the page if failed attempt
if(empty($_SESSION['first_name'])){
    header("Location: logout.php");
}

$user_first = $_SESSION['first_name'];
$user_last = $_SESSION['last_name'];
$user_role = $_SESSION['role'];
$user_id = $_SESSION["user_id"];
include ('rolebased.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/base.css">
    <link rel="stylesheet" href="bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="bootstrap/css/admin_dashboard.css">
</head>
<body style="background-color: #024059;">

    <div id="floatingNotification" class="toast-notification">
        <span id="toastMessage"></span>
    </div>
    
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1>Welcome!</h1>
                <h1><?php echo htmlspecialchars($user_role) . ":"; ?> <?php echo htmlspecialchars($user_first); ?> <?php echo htmlspecialchars($user_last); ?></h1>
            </a>
            <div class="navAdmin">
                <a href="index.php" class="btn btn-primary me-2">Home</a>
                <?php
                    if ($user_role == 'Admin'){
                        echo '<a href="student_crud.php" class="btn btn-primary me-2">Students</a><a href="admin_crud.php" class="btn btn-primary me-2">Admins</a><a href="subject_crud.php" class="btn btn-primary me-2">Subjects</a> <a href="audit_crud.php" class="btn btn-primary me-2">Activity</a>';
                    }

                    else{
                    
                        echo '';
                    }
                ?>

                <a  class="setting" href="settings.php">
                    <i class="bi bi-gear" id="settings-icon"></i>
                </a>

                
            </div>
        </div>
    </nav>

    


    
</body>

<script>
    const toastMessage = <?php echo json_encode($_SESSION['otp_verified']); ?>;

    function showToast(message, duration = 3000) {
        const toast = document.getElementById('floatingNotification');
        const messageSpan = document.getElementById('toastMessage');
        messageSpan.textContent = message;

        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
        }, duration);
    }


    if (toastMessage) {
        showToast(toastMessage);
    }


</script>
