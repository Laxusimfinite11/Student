<?php
include('conn.php');
include('rolebased.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectID = $_POST['subjectID'] ?? '';

    $subjectID = mysqli_real_escape_string($conn, $subjectID);

    $query = "DELETE FROM subject WHERE subjectID = '$subjectID'";

    if (mysqli_query($conn, $query)) {
        header("Location: subject_crud.php?message=Subject+Deleted+Successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
