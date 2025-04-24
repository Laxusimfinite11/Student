<?php
include('conn.php');
include('rolebased.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'] ?? '';
    $subject_id = $_POST['subjectID'] ?? '';

    $user_id = mysqli_real_escape_string($conn, $user_id);
    $subject_id = mysqli_real_escape_string($conn, $subject_id);

    $query = "DELETE FROM grades WHERE user_id = '$user_id' AND subject_id = '$subject_id'";

    if (mysqli_query($conn, $query)) {
        header("Location: subjects_tab.php?user_id=$user_id");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
