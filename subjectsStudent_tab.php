<?php
include ('base.php');
$user_id = $_GET['user_id'];
$query = "SELECT user_id, first_name, mobile_number, last_name, email, password FROM users where user_id=$user_id";
$studentresult = $conn->query($query);
$query = "SELECT * FROM grades 
          JOIN users ON users.user_id = grades.user_id 
          JOIN subject ON subject.subjectid = grades.subject_id 
          WHERE users.user_id = $user_id";
$subjectresult = $conn->query($query);
?>
<body style="background-color: #024059;">
    <div class="container mt-5">
        <h2 class="text-center text-light">Student Subjects Dashboard</h2>
        <div class="card mt-4">
            <div class="card-body">
                <h4>Student Name: <span id="studentName"><?php
                    $studentrow = $studentresult->fetch_assoc();
                    echo $studentrow['first_name'] . " " . $studentrow['last_name'];
                ?></span></h4>
                <h5>Student ID: <span id="studentID"><?php
                    echo $studentrow['user_id'];
                ?></span></h5>
                <h4 class="mt-4">Subjects</h4>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($subjectresult->num_rows > 0): ?>
                            <?php while ($row = $subjectresult->fetch_assoc()): ?>

                                
                                <?php $status = "";

                                    if ($row["grades"] < 1) {
                                        $status = "";
                                    }
                                    else if ($row['grades'] <= 3) {
                                        $status = "<p style='color: green;'>passed</p>";
                                    }

                                    else if ($row['grades'] <= 4) {
                                        $status = "<p style='color: #FFA500;'>incomplete</p>";
                                    }

                                    else {
                                        $status = "<p style='color: red;'>failed</p>";
                                } ?>

                                 <?php $grade = "";
                                 
                                    if ($row["grades"] < 1) {
                                        $grade = "No-grade";
                                    }

                                    else {
                                        $grade = $row['grades'];
                                    } ?>

                                <tr>
                                    <td><?php echo htmlspecialchars($row['subjectID']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($grade); ?></td>
                                    <td><?php echo ($status); ?></td>
                                </tr>

                                
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No subjects found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubjectModalLabel">Enroll Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubjectForm" action="enroll_subject.php" method="POST">
                    
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="<?php echo $studentrow['user_id']; ?>">
                        <label for="subjectDropdown" class="form-label">Select Subject</label>
                        <select class="form-select" id="subjectDropdown" name="subject_id" required>
                        <option value="">Select a Subject</option>
                            <?php
                            
                            include('conn.php');
                            $query = "SELECT subjectid, name FROM subject";
                            $result = mysqli_query($conn, $query);
                            
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['subjectid'] . "'>" . $row['name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No subjects available</option>";
                            }
                            ?>
                        </select>

                    </div>

                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Enroll Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
