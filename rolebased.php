<?php
$sql = "SELECT page_name FROM user_page_access WHERE user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$allowed_pages = [];

while ($row = $result->fetch_assoc()) {
    $allowed_pages[] = $row['page_name'];
}

$default_role_pages = [
    'Admin' => ["admin_dashboard.php", "add_admin.php",
     "add_student.php", "add_subject.php","audit_crud.php",
      "delete_admin.php", "delete_subject.php","edit_admin.php", 
      "edit_grade.php", "edit_subject.php"],

    "Student" => ['student_dashboard.php', 'subjectsStudent_tab.php'],
];

$allowed_pages = array_merge($allowed_pages, $default_role_pages[$user_role] ?? []);

$current_page = basename($_SERVER['PHP_SELF']);
if (!in_array($current_page, $allowed_pages)) {
    header('Location: warning.php');
    exit();
}


/*if($_SESSION['role'] != "Admin"){
    header('Location: warning.php');
    exit();
}*/
?>