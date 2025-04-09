<?php
include ('base.php');
$user_id = $_SESSION['user_id'];
?>

    
    <div class="container mt-5 text-center">
        <h2 style="color: white;">Manage Users</h2>
        <div class="d-flex justify-content-center mt-4">
            
            

            <form action="subjectsStudent_tab.php" method="get">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <button type="submit" class="btn btn-primary me-3">See Grades</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
