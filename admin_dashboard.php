<?php
include('base.php');

function totalUser($conn, $role) {
    $query = "SELECT COUNT(*) AS totalUsers FROM users WHERE role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    return $row['totalUsers'] ?? 0;
}

function totalSubject($conn) {
    $query = "SELECT COUNT(*) AS totalSubject FROM subject";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['totalSubject'] ?? 0;
    }
}

function mostEnrolledSub($conn) {
    $query = "SELECT 
                a.subject_id,
                b.name AS subject_name,
                COUNT(*) AS total_enrolled
              FROM 
                grades AS a
              JOIN 
                subject AS b ON a.subject_id = b.subjectID
              GROUP BY 
                a.subject_id, b.name
              ORDER BY 
                total_enrolled DESC
              LIMIT 3";

    $result = $conn->query($query);

    echo "<table class='tableSub'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['subject_name']}</td>
                <td>{$row['total_enrolled']}</td>
              </tr>";
    }
    echo "</tbody></table>";
}

function topPerformer($conn) {
    $query = "SELECT 
        CONCAT(b.first_name, ' ', b.last_name) AS student_name,
        ROUND(SUM(a.grades) / 8, 2) AS gwa
    FROM 
        grades AS a
    JOIN 
        users AS b ON a.user_id = b.user_id
    WHERE b.role = 'Student'
    GROUP BY 
        a.user_id
    LIMIT 5";
}
?>

<link rel="stylesheet" href="styles.css">

<div class="dashboardElements">
    <div class="containerTotalUser">
        <div class="studentTotal">
            <h3>STUDENT</h3>
            <div class="total">
                <p><?php echo htmlspecialchars(totalUser($conn, "Student")); ?></p>
            </div>
        </div>

        <div class="teacherTotal">
            <h3>TEACHER</h3>
            <div class="total">
                <p><?php echo htmlspecialchars(totalUser($conn, "Teacher")); ?></p>
            </div>
        </div>

        <div class="adminTotal">
            <h3>ADMIN</h3>
            <div class="total">
                <p><?php echo htmlspecialchars(totalUser($conn, "Admin")); ?></p>
            </div>
        </div>
    </div>

    <div class="containerTotalSubject">
        <div class="TotalSubject">
            <h3>SUBJECT</h3>
            <div class="totalCircle">
                <p><?php echo htmlspecialchars(totalSubject($conn)); ?></p>
            </div>
        </div>

        <div class="mostSubject">
            <h3>MOST ENROLL</h3>
            <div class="tableWrapper">
                <?php mostEnrolledSub($conn); ?>
            </div>
        </div>
    </div>

</div>

<div class="dashboardElements">
    <div class="containerTopPerformer">
    </div>

    <div class="containerTeacherPerformance">
        
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
