<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Settings</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .settings-container {
            text-align: center;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 300px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            cursor: pointer;
        }
        .save-btn {
            background-color: #28a745;
            color: white;
        }
        .save-btn:hover {
            background-color: #218838;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="settings-container">
        <h2>Seller Settings</h2>
        <input type="text" placeholder="Store Name" id="storeName">
        <input type="text" placeholder="Contact Email" id="contactEmail">
        <input type="text" placeholder="Phone Number" id="phoneNumber">
        <button class="save-btn" onclick="saveSettings()">Save Settings</button>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <script>
        function saveSettings() {
            const storeName = document.getElementById('storeName').value;
            const contactEmail = document.getElementById('contactEmail').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            
            if (storeName && contactEmail && phoneNumber) {
                alert('Settings Saved Successfully!');
            } else {
                alert('Please fill out all fields.');
            }
        }

        function logout() {
            window.location.href = "logoutsel.php"; // Redirect to logout page
        }
    </script>
</body>
</html>
