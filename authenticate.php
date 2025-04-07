<?php
include ('conn.php');
session_start();


if(empty($_SESSION['first_name'])){
    header("Location: logout.php");
}

$user_email = $_SESSION['email'];
$user_no = $_SESSION['mobile_number'];
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
            <h2 class="text-center mb-4">Authenticate</h2>
            <h5>Choose to send your OTP Code</h5>
            <div class="but">
                <button class="btn btn-primary w-100" id="emailBtn">Email</button>
                <button class="btn btn-primary w-100" id="smsBtn">SMS</button>
            </div>
            <!-- Container to hold the form, initially hidden -->
            <div id="formContainer" style="display: none; margin-top: 20px;">

                <!-- Email Form -->
                <div id="emailForm" style="display: none;">
                    <form action="verify_otp.php" method="post">
                        <h5>Email: <?php echo htmlspecialchars($user_email); ?></h5>
                        <input name="otp" id="reqInputEmail" style="display: none;" type="txt" class="form-control" placeholder="Enter OTP Code" required>
                        <button class="btn btn-primary w-100 mt-3" type="button" id="reqEmailOTP">Request OTP</button>
                        <button style="display: none;" class="btn btn-primary w-100 mt-3" type="submit" id="butConEmail">Confirm</button>
                    </form>
                </div>

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
    fetch('otp_send.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'send_otp=true' // You can customize this flag or include more data
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
        document.getElementById('formContainer').style.display = 'block';
        document.getElementById('emailForm').style.display = 'block';
        document.getElementById('smsForm').style.display = 'none';
        document.getElementById('reqEmailOTP').style.display = 'block';
        document.getElementById('reqInputEmail').style.display = 'none';
        document.getElementById('butConEmail').style.display = 'none';
        
        
    });

    document.getElementById('smsBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the page reload
        // Show the form container and hide others
        document.getElementById('formContainer').style.display = 'block';
        document.getElementById('smsForm').style.display = 'block'; 
        document.getElementById('emailForm').style.display = 'none';
        document.getElementById('reqSMSOTP').style.display = 'block';
        document.getElementById('reqInputSMS').style.display = 'none';
        document.getElementById('butConSMS').style.display = 'none';
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
