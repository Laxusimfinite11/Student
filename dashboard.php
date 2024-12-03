<?php
include ('conn.php');
session_start();

$user_first = $_SESSION['first_name'];
$user_last = $_SESSION['last_name'];
$user_role = $_SESSION['role'];

$query = "SELECT user_id, first_name, last_name, email, role FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/dashboard.css">
</head>
<body style="background-color: #024059;">
    <!-- navbar to -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1>Student Management Dashboard</h1>
                <h1>Welcome!</h1>
                <h1><?php echo htmlspecialchars($user_role); ?> <?php echo htmlspecialchars($user_first); ?> <?php echo htmlspecialchars($user_last); ?></h1>
            </a>
            <div class="navbar-nav ms-auto">
                <a href="login.html" class="btn btn-log-out">Log Out</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <!-- modal ng add student -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addStudentForm">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="studentName" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="studentLastName" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentMiddleName" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="studentMiddleName" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="studentEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentAge" class="form-label">Age</label>
                                <input type="number" class="form-control" id="studentAge" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- add student button dito -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>

        <!-- ito dashboard -->
        <div class="dashboard-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Subjects</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <?php if ($row['role'] == 'Student'): ?>
                                <!-- nag add ako example para makita niyo result pag nalagyan
                                , kayo na mag connect wahhaahaha -->
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>
                                        <a href="subjects.html" class="btn btn-view-subjects btn-sm">View Subjects</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteConfirmationModal" 
                                                data-student-id="1">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- modal ng delete -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this student?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
