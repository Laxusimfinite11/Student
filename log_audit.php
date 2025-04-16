<?php
function logActivity($conn, $user_id, $activity_type, $activity_description = null) {
    $ip_address = $_SERVER["REMOTE_ADDR"];
    $user_agent = substr($_SERVER["HTTP_USER_AGENT"], 0, 255);

    if ($ip_address === '::1') {
        $ip_address = '127.0.0.1';

        $stmt = $conn->prepare("INSERT INTO user_activity_log (user_id, activity_type, activity_description, ip_address, user_agent) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $activity_type, $activity_description, $ip_address, $user_agent);
        $stmt->execute();
        $stmt->close();
    
    } else {
        $stmt = $conn->prepare("INSERT INTO user_activity_log (user_id, activity_type, activity_description, ip_address, user_agent) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $activity_type, $activity_description, $ip_address, $user_agent);
        $stmt->execute();
        $stmt->close();

    }
}
?>