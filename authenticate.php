<?php
include ('conn.php');
session_start();

$stmt = $conn->prepare("SELECT otp_enabled FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $input_email);
$stmt->execute();
$stmt->bind_result($otp_enabled);


$_SESSION['otp_enabled'] = $otp_enabled;

if(empty($_SESSION['first_name'])) {
    header("Location: logout.php");
    exit();
}

if ($otp_enabled    ) {
    header("Location: logout.php");
    exit();
}


if (isset($_SESSION['otp_verified']) && $_SESSION['otp_verified'] === true) {
    header("Location: admin_dashboard.php");
    exit();
}

$user_email = $_SESSION['email'];
$user_no = $_SESSION['mobile_number'];

$otp_error = isset($_SESSION['otp_error']) ? $_SESSION['otp_error'] : '';
unset($_SESSION['otp_error']);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="bootstrap/css/login.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.rtl.min.css">
    <link rel="stylesheet" href="bootstrap/css/authenticate.css">
</head>
<body style="background-color: #024059;">
<div class="container-fluid">
    <div class="centered-container">
        <div class="login-container">
            <a href="logout.php" class="btn btn-danger">Cancel</a>
            <h2 class="text-center mb-4">Authenticate</h2>
            <h5>Choose to send your OTP Code</h5>
            <!-- Container to hold the form, initially hidden -->
            <div id="formContainer" style="display: block; margin-top: 20px;">

                <!-- Email Form -->
                
                    <form action="verify_otp.php" method="post">
                        <div class="but">
                            <button class="btn btn-primary w-100" id="emailBtn">Email</button>
                            <button class="btn btn-primary w-100" id="smsBtn">SMS</button>
                            <input type="hidden" name="userOtpMethod" id="OtpVal" value="">
                        </div>

                        <div id="emailForm" style="display: none;">
                            <?php if ($otp_error): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo htmlspecialchars($otp_error); ?>
                                </div>
                            <?php endif; ?>
                            <h5>Email: <?php echo htmlspecialchars($user_email); ?></h5>
                            <input name="otp" id="reqInputEmail" style="display: none;" type="txt" class="form-control" placeholder="Enter OTP Code" required>
                            <button class="btn btn-primary w-100 mt-3" type="button" id="reqEmailOTP">Request OTP</button>
                            <button style="display: none;" class="btn btn-primary w-100 mt-3" type="submit" id="butConEmail">Confirm</button>
                        </div>
                    </form>
               

                <!-- SMS Form -->
                <div id="smsForm" style="display: none;">
                    <form>
                        <h5>Phone No. <?php echo htmlspecialchars($user_no); ?></h5>
                        <input id="reqInputSMS" style="display: none;" type="email" class="form-control" placeholder="Enter OTP Code" required>
                        <button style="display: block;" class="btn btn-primary w-100 mt-3" type="submit" id="reqSMSOTP">Request OTP</button>
                        <button style="display: none;" class="btn btn-primary w-100 mt-3" type="submit" id="butConSMS">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function sendOTP() {
    const otpMethod = document.getElementById("OtpVal").value;
    
    fetch('otp_send.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'send_otp=true&userOtpMethod=' + otpMethod // Pass the method here
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('result').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


    // JavaScript to handle button clicks
    document.getElementById('emailBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the page reload
        // Show the form container and hide others
        document.getElementById('emailForm').style.display = 'block';
        document.getElementById('smsForm').style.display = 'none';
        document.getElementById('reqEmailOTP').style.display = 'block';
        document.getElementById('reqInputEmail').style.display = 'none';
        document.getElementById('butConEmail').style.display = 'none';
        document.getElementById("OtpVal").value = "email";
    });

    document.getElementById('smsBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the page reload
        // Show the form container and hide others
        document.getElementById('smsForm').style.display = 'block'; 
        document.getElementById('emailForm').style.display = 'none';
        document.getElementById('reqSMSOTP').style.display = 'block';
        document.getElementById('reqInputSMS').style.display = 'none';
        document.getElementById('butConSMS').style.display = 'none';
        document.getElementById("OtpVal").value = "txt";
    });

    document.getElementById('reqEmailOTP').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the page reload
        // Show the form container and hide others
        sendOTP();
        document.getElementById('reqEmailOTP').style.display = 'none';
        document.getElementById('reqInputEmail').style.display = 'block';
        document.getElementById('butConEmail').style.display = 'block';
        
    });

    document.getElementById('reqSMSOTP').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the page reload
        // Show the form container and hide others
        document.getElementById('reqSMSOTP').style.display = 'none';
        document.getElementById('reqInputSMS').style.display = 'block';
        document.getElementById('butConSMS').style.display = 'block';
    });
</script>
</body>
</html>
