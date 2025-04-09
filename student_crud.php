<?php
include ('base.php');
?>
<<<<<<< HEAD
<body>

        <!-- Dashboard Container -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

        
             <a class="navbar-brand" href="#">Dashboard</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link active" href="admin_dashboard.php">Home</a>
                     </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_crud.php">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student_crud.php">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="subject_crud.php">Subjects</a>
                        </li>
                    </ul>
                </div>
             </div>
        </nav>

        <div class="container mt-5">
        <!-- modal ng add student -->
=======
    <div class="container mt-5">
        
>>>>>>> 33834b33b9055b07851b95d34f63a16cad2e2eb7
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addStudentForm" action="add_student.php" method="POST">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="studentLastName" name="studentLastName" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="studentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="studentEmail" name="studentEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentMobileNumber" class="form-label">Mobile Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="number" class="form-control" id="studentMobileNumber" name="studentMobileNumber" maxlength="10" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="studentPassword" class="form-label">Password</label>
                                <input type="text" class="form-control" id="studentPassword" name="studentPassword" required>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>

        
        <?php
        $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
        $top_performers = isset($_GET['top_performers']) ? true : false;  

        $query = "
            SELECT u.user_id, u.first_name, u.last_name, u.email, u.mobile_number
            FROM users u
            WHERE u.role = 'Student'
        ";

        if (!empty($search)) {
            $query .= " AND (u.user_id LIKE '%$search%' 
                            OR u.first_name LIKE '%$search%' 
                            OR u.last_name LIKE '%$search%' 
                            OR u.email LIKE '%$search%' 
                            OR u.mobile_number LIKE '%$search%')";
        }

        $result = $conn->query($query);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $grades_query = "SELECT grades FROM grades WHERE user_id = " . $row['user_id'] . " AND grades IS NOT NULL";
            $grades_result = $conn->query($grades_query);

            $gwa = 0;
            $num_grades = 0;
            while ($grade_row = $grades_result->fetch_assoc()) {
                $gwa += $grade_row['grades'];
                $num_grades++;
            }
            if ($num_grades > 0) {
                $gwa = $gwa / $num_grades;  
            } else {
                $gwa = 0;  
            }


            $students[] = array_merge($row, ['gwa' => $gwa]);
        }



        if ($top_performers) {
            $students = array_filter($students, function($student) {
                return $student['gwa'] >= 1.0 && $student['gwa'] <= 2.0;
            });
        }
        ?>

<<<<<<< HEAD
            <!-- Search Bar -->
=======
        
        <div class="dashboard-container">
            
>>>>>>> 33834b33b9055b07851b95d34f63a16cad2e2eb7
            <form method="get" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control" 
                        placeholder="Search by ID, name, email, or mobile number" 
                        value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            
            <form method="get" action="" class="mb-3">
                <button type="submit" class="btn btn-success" name="top_performers" value="1">
                    Top Performers
                </button>
            </form>

            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>GWA</th>
                        <th>Subjects</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($students)): ?>
                        <?php foreach ($students as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['mobile_number']); ?></td>
                                <td><?php echo number_format($row['gwa'], 2); ?></td>
                                <td>
                                    <form action="subjects_tab.php" method="get">
                                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                        <button type="submit" class="btn btn-view-subjects btn-sm">View Subjects</button>
                                    </form>
                                </td>
                                <td>
                                    
                                    <button class="btn btn-warning btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal<?php echo $row['user_id']; ?>">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal-<?php echo $row['user_id']; ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            
                    <div class="modal fade" id="editModal<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $row['user_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?php echo $row['user_id']; ?>">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_student.php" method="POST">
                                        
                                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">

                                        <div class="mb-3">
                                            <label for="firstName<?php echo $row['user_id']; ?>" class="form-label">First Name</label>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="firstName<?php echo $row['user_id']; ?>" 
                                                name="first_name" 
                                                value="<?php echo htmlspecialchars($row['first_name']); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName<?php echo $row['user_id']; ?>" class="form-label">Last Name</label>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="lastName<?php echo $row['user_id']; ?>" 
                                                name="last_name" 
                                                value="<?php echo htmlspecialchars($row['last_name']); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email<?php echo $row['user_id']; ?>" class="form-label">Email</label>
                                            <input 
                                                type="email" 
                                                class="form-control" 
                                                id="email<?php echo $row['user_id']; ?>" 
                                                name="email" 
                                                value="<?php echo htmlspecialchars($row['email']); ?>">
                                        </div>
                                        <div class="mb-3">
                                        <label for="mobileNumber<?php echo $row['user_id']; ?>" class="form-label">Mobile Number</label>
                                        <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="mobileNumber<?php echo $row['user_id']; ?>" 
                                                name="mobile_number" 
                                                value="<?php echo htmlspecialchars($row['mobile_number']); ?>">
                                </div>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label for="password<?php echo $row['user_id']; ?>" class="form-label">Password</label>
                                            <input 
                                                type="password" 
                                                class="form-control" 
                                                id="password<?php echo $row['user_id']; ?>" 
                                                name="password" 
                                                placeholder="Leave password blank if not edited"
                                                value="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteModal-<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo $row['user_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="delete_student.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel-<?php echo $row['user_id']; ?>">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete user <strong><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></strong>?</p>
                                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
<<<<<<< HEAD
    <!-- modal ng delete -->
=======





    
>>>>>>> 33834b33b9055b07851b95d34f63a16cad2e2eb7

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
