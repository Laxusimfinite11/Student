<?php
include ('base.php');
?>
<html>
    <body>

    <div class="container">
        <div class="d-flex flex-column align-items-start">
            <?php
                if ($user_role == 'Admin'){
                    echo '<a href="student_crud.php" class="btn btn-primary me-2">Manage Students</a>
                    <a href="admin_crud.php" class="btn btn-primary me-2"> Manage Admins</a>
                    <a href="subject_crud.php" class="btn btn-primary me-2">Manage Subjects</a>';
                }

                else{
                    // dito ilagay yung tabs ng sa student dashboard
                    echo '';
                }
            ?>
            <a href="logout.php" class="btn btn-log-out me-2">Log Out</a>
        </div>
    </div>
            <!-- Links Section -->
            <h1 class="welcome-text">Welcome to</h1>
            <h2 class="univ-name">Piltover University!</h2>
            <h3 class="admin-dash">Admin Dashboard</h3>
            <h4 class="admin-greet">Hello, <strong><?php echo htmlspecialchars($user_role); ?> <?php echo htmlspecialchars($user_first); ?> <?php echo htmlspecialchars($user_last); ?></strong>!</h4>
            <h4 class="ready">Ready to manage your tasks today?</h4>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>>

