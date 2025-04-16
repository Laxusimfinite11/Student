<?php
include('base.php');

$query = "
    SELECT b.first_name, b.last_name, b.role, 
    a.activity_type, a.activity_description, a.created_at 
    FROM user_activity_log AS a
    JOIN users AS b ON a.user_id = b.user_id
";

$result = $conn->query($query);


?>

<div class="container mt-5">
        
        <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addSubjectForm" action="add_subject.php" method="post">
                            <div class="mb-3">
                                <label for="subjectName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="subjectName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="subjectDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="subjectDescription" name="description" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add Subject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div class="dashboard-container">
    
    <form method="get" action="" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" id="searchInput" class="form-control" 
                   placeholder="Search Subject by ID, name, or description" 
                   value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Role</th>
                <th>Actor</th>
                <th>Activity</th>
                <th>Description</th>
                <th>Date Perform</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td><?php echo htmlspecialchars($row['first_name']); ?> <?php echo htmlspecialchars($row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['activity_type']); ?></td>
                        <td><?php echo htmlspecialchars($row['activity_description']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>

                    
                    <div class="modal fade" id="editModal-<?php echo htmlspecialchars($row['subjectID']); ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo htmlspecialchars($row['subjectID']); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="edit_subject.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel-<?php echo htmlspecialchars($row['subjectID']); ?>">Edit Subject</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="subjectID" value="<?php echo htmlspecialchars($row['subjectID']); ?>">
                                        <div class="mb-3">
                                            <label for="subjectName-<?php echo htmlspecialchars($row['subjectID']); ?>" class="form-label">Subject Name</label>
                                            <input type="text" class="form-control" id="subjectName-<?php echo htmlspecialchars($row['subjectID']); ?>" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subjectDescription-<?php echo htmlspecialchars($row['subjectID']); ?>" class="form-label">Description</label>
                                            <textarea class="form-control" id="subjectDescription-<?php echo htmlspecialchars($row['subjectID']); ?>" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <div class="modal fade" id="deleteModal-<?php echo htmlspecialchars($row['subjectID']); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo htmlspecialchars($row['subjectID']); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="delete_subject.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel-<?php echo htmlspecialchars($row['subjectID']); ?>">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the subject "<strong><?php echo htmlspecialchars($row['name']); ?></strong>"?</p>
                                        <input type="hidden" name="subjectID" value="<?php echo htmlspecialchars($row['subjectID']); ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No subjects found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>