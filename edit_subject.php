<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectID = $_POST['subjectID'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    $subjectID = mysqli_real_escape_string($conn, $subjectID);
    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);

    $query = "UPDATE subject SET name = '$name', description = '$description' WHERE subjectID = '$subjectID'";

    if (mysqli_query($conn, $query)) {
        header("Location: subject_crud.php?message=Subject+Updated+Successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
