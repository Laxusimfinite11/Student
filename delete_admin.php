<?php
include('conn.php');
include('log_audit.php');
session_start();
$users_id = $_SESSION['user_id'];
$admin_name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'] ?? '';

    $query_temp = "SELECT first_name, last_name FROM users WHERE user_id = ?";

    $stmt = $conn->prepare(($query_temp));
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cre = $result->fetch_assoc();
    $stmt->close();

    $userName = $user_cre['first_name'] . " " . $user_cre['last_name'];

    if (!empty($users_id)) {
        $user_id = mysqli_real_escape_string($conn, $user_id);
        
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        
        if (mysqli_query($conn, $query)) {
            logActivity(
            $conn,
            $users_id,
            "Delete Admin",
            "Admin account for $userName was deleted by $admin_name."
        );
            header("Location: admin_crud.php?message=User+Deleted+Successfully");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid User ID.";
    }

    mysqli_close($conn);
}
?>
