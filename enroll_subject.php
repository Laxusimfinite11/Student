<?php
include('conn.php');


$subjectID = $_POST['subject_id'] ?? '';  
$user_id = $_POST['user_id'] ?? '';      




if (!empty($subjectID) && !empty($user_id)) {
    $query = "INSERT INTO grades (subject_id, user_id) VALUES ('$subjectID', '$user_id')";
    
    if (mysqli_query($conn, $query)) {
        $message = "Subject Enrolled Successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
} else {
    $message = "Error: Please select a subject and try again.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subject Enrollment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Subject Enrollment</h1>
        
        <!-- Display success or error message -->
        <div class="alert <?php echo (isset($message) && strpos($message, 'Successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        
        <!-- Button to go back to the subject list -->
        <form action="subjects_tab.php" method="get">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <!-- Pass the user_id properly -->
            <button type="submit" class="btn btn-view-subjects btn-sm">View Subjects</button>
        </form>
    </div>
</body>
</html>
