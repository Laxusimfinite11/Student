<?php
include ('base.php');

$query = "SELECT COUNT(*) AS total_students FROM users WHERE role = 'Student'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$totalStudent = $row['total_students'];
?>
    
    <!-- <div class="container mt-5 text-center">
        <h2 style="color: white;">Manage Users</h2>
        <div class="d-flex justify-content-center mt-4">
            <a href="student_crud.php" class="btn btn-primary me-3">Manage Students</a>
            <a href="admin_crud.php" class="btn btn-primary me-3">Manage Admins</a>
            <a href="subject_crud.php" class="btn btn-primary me-3">Manage Subjects</a>
        </div>
    </div> -->

    <div class="containerTotalUser">
        <div class="studentTotal">
            <h3>STUDENT</h3>
            <div class="total">
                <p><?php echo htmlspecialchars($totalStudent); ?></p>
            </div>
        </div>

        <div class="teacherTotal">
            <h3>TEACHER</h3>
            <div class="total">
                <p><?php echo htmlspecialchars($totalStudent); ?></p>
            </div>
        </div>

        <div class="adminTotal">
            <h3>ADMIN</h3>
            <div class="total">
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
