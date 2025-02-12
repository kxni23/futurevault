<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Instagram</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background:url('./download\ \(1\).jpg') no-repeat center center/cover;
            font-family: Arial, sans-serif;
        }
        .logout-container {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .logout-btn {
            background-color: #0095f6;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #007acc;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logo">Future Valut</div>
        <p>Are you sure you want to log out?</p>
        <button class="logout-btn" onclick="logout()">Log Out</button>
    </div>

    <script>
        function logout() {
            alert("You have been logged out.");
            window.location.href = "loginn.html"; // Redirect to login page
        }
    </script>
</body>
</html>