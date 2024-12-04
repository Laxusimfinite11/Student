<?php
include ('base.php');
?>
    <div class="container mt-5">
        <!-- modal ng add admin -->
        <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="addAdminForm" action="add_admin.php" method="POST">
                            <div class="mb-3">
                                <label for="adminName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="adminName" name="adminName" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="adminLastName" name="adminLastName" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="adminEmail" name="adminEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminMobileNumber" class="form-label">Mobile Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="number" class="form-control" id="adminMobileNumber" name="adminMobileNumber" maxlength="10" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="adminPassword" class="form-label">Password</label>
                                <input type="text" class="form-control" id="adminPassword" name="adminPassword" required>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- add student button dito -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add Admin</button>

        <!-- ito dashboard -->
        <div class="dashboard-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Admin ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <?php if ($row['role'] == 'Admin'): ?>
                                <!-- nag add ako example para makita niyo result pag nalagyan
                                , kayo na mag connect wahhaahaha -->
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['mobile_number']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteConfirmationModal" 
                                                data-admin-id="1">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No admins found.</td>
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
                    Are you sure you want to delete this admin?
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
