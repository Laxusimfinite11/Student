<?php
include('base.php');

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$query = "
    SELECT b.first_name, b.last_name, b.role, 
    a.activity_type, a.activity_description, a.created_at 
    FROM user_activity_log AS a
    JOIN users AS b ON a.user_id = b.user_id
";

if (!empty($search)) {
    $query .= " AND (role LIKE '%$search%'
                OR first_name LIKE '%$search%'
                OR last_name LIKE '%$search%'
                OR activity_type LIKE '%$search%'
                OR created_at LIKE '%$search%')";
}

$result = $conn->query($query);
?>

<div class="container mt-5">
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
                        <td class="date-time"><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
// Function to format the date in 'May 2, 2001 7:00 PM' format
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true
    };
    return date.toLocaleString('en-US', options);
}

// Wait for the DOM to load before manipulating the DOM elements
document.addEventListener("DOMContentLoaded", function() {
    // Get all the date-time cells and format them
    const dateCells = document.querySelectorAll('.date-time');
    dateCells.forEach(cell => {
        const formattedDate = formatDate(cell.textContent);
        cell.textContent = formattedDate;
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
