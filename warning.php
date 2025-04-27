<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warning</title>
    <style>
        /* Centering the content */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .content {
            padding: 20px;
            border: 2px solid red;
            border-radius: 8px;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2 style="color: red;">Access Denied</h2>
        <p>You do not have permission to access this page.</p>
        <a href="javascript:history.back()">Go Back</a>
    </div>
</body>
</html>
        