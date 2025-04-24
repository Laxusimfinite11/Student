<?php
include('conn.php');
include('rolebased.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'] ?? '';

    if (!empty($user_id)) {
        $user_id = mysqli_real_escape_string($conn, $user_id);
        
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        
        if (mysqli_query($conn, $query)) {
            header("Location: student_crud.php?message=User+Deleted+Successfully");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid User ID.";
    }

    mysqli_close($conn);
}
?>
