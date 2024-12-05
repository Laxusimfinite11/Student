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

        <!-- add admin button dito -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add Admin</button>

        <!-- ito dashboard -->
        <?php
// Handle search query for admins
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Query to fetch admins with optional search filtering
$query = "
    SELECT user_id, first_name, last_name, email, mobile_number
    FROM users
    WHERE role = 'Admin'
";

// Append search condition if search input is provided
if (!empty($search)) {
    $query .= " AND (user_id LIKE '%$search%' 
                OR first_name LIKE '%$search%' 
                OR last_name LIKE '%$search%' 
                OR email LIKE '%$search%' 
                OR mobile_number LIKE '%$search%')";
}

$result = $conn->query($query);
?>

<!-- Dashboard Container -->
<div class="dashboard-container">
    <!-- Admin Search Bar -->
    <form method="get" action="" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" id="searchInput" class="form-control" 
                   placeholder="Search Admin by ID, name, email, or mobile number" 
                   value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Admin Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Admin ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile_number']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button 
                                class="btn btn-warning btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editModal<?php echo $row['user_id']; ?>">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <button class="btn btn-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal-<?php echo $row['user_id']; ?>">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Edit Modal for Each Admin -->
                    <div class="modal fade" id="editModal<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $row['user_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?php echo $row['user_id']; ?>">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_admin.php" method="POST">
                                        <!-- Hidden field for user ID -->
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
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="mobileNumber<?php echo $row['user_id']; ?>" 
                                                name="mobile_number" 
                                                value="<?php echo htmlspecialchars($row['mobile_number']); ?>">
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
                                <form action="delete_admin.php" method="POST">
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
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No admins found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
