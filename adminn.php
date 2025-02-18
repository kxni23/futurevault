<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Memory My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            font-family: Arial, sans-serif;
            padding-top: -27px;
            /* To offset the fixed header */
        }

        .header {
            width: 100%;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            padding: 10px 30px;
            /* Adjust padding for better alignment */
            text-align: left;
            /* Keep title left-aligned */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            /* Ensures the title and home icon are spaced properly */
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 1.75rem;
        }

        .header .home-icon {
            font-size: 1.25rem;
            color: white;
            text-decoration: none;
        }

        .content {
            padding: 30px;
            margin-top: 80px;
            /* Adjust for header height */
        }

        .dashboard-container {
            background-color: #ffffffaf;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.75rem;
            margin-bottom: 15px;
            font-weight: 600;


        }

        .btn-primary,
        .btn-secondary {
            font-size: 1rem;
            background-color: rgb(102, 154, 210);
            color: azure;
            border-color: rgba(255, 255, 255, 0);
        }

        .section-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
    <style>
        /* 3D Loader Animation */
        .loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none;
        }

        .loader-3d {
            width: 50px;
            height: 50px;
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Pop-up Styles */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 8px;
            color: white;
            z-index: 9999;
            text-align: center;
        }

        .popup-content {
            padding: 10px;
        }
    </style>

</head>

<body>
    <div class="header">
        <h1>ADMIN</h1>
        <a href="home.html" class="home-icon">
            <i class="fas fa-home"></i> Home
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="dashboard-container">
            <h1 class="mb-4">Admin Dashboard</h1>

            <!-- Section: Manage Memories -->
            <div class="section-container">
                <section id="manage-memories">
                    <h2 class="section-title">Manage Memories</h2>
                    <p>Access and manage all memories stored by users in the application. Perform actions like viewing, editing, or deleting entries as needed.</p>
                    <a href="manage-memories.html" class="btn btn-primary">View All Memories</a>
                </section>
            </div>

            <!-- Section: Manage Users -->
            <div class="section-container">
                <section id="manage-users">
                    <h2 class="section-title">Manage Users</h2>
                    <p>Oversee user accounts, update user permissions, and ensure smooth user management across the platform.</p>
                    <a href="manage-users.html" class="btn btn-primary">View All Users</a>
                </section>
            </div>

            <!-- Section: Settings -->
            <div class="section-container">
                <section id="settings">
                    <h2 class="section-title">Settings</h2>
                    <p>Adjust application preferences and settings to maintain optimal functionality and a personalized admin experience.</p>
                    <a href="settings.html" class="btn btn-secondary">Edit Settings</a>
                </section>
            </div>

            <!-- Section: Analytics -->
            <div class="section-container">
                <section id="analytics">
                    <h2 class="section-title">Analytics</h2>
                    <p>Analyze user engagement metrics, application performance, and other key data points to make informed decisions.</p>
                    <a href="analytics.html" class="btn btn-secondary">View Analytics</a>
                </section>
            </div>
            <div class="section-container">
                <section id="EmailNotification">
                    <h2 class="section-title">Email Notification</h2>
                    <p>Manage reminders.</p>
                    <button class="btn btn-secondary" id="sendEmailBtn">Send Email</button>
                </section>
            </div>

            <!-- Loading Spinner -->
            <div id="loader" class="loader" style="display: none;">
                <div class="loader-3d"></div>
            </div>

            <!-- Pop-up Message -->
            <div class="popup" id="popup" style="display: none;">
                <div class="popup-content">
                    <p id="popup-message"></p>
                    <button onclick="closePopup()">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('sendEmailBtn').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            // Send AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'api/email.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                // Hide loader once the request is complete
                document.getElementById('loader').style.display = 'none';

                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    showPopup(response.                                                                                                                                                                                                                         );
                } else {
                    showPopup('An error occurred while sending the email.');
                }
            };

            xhr.onerror = function() {
                document.getElementById('loader').style.display = 'none';
                showPopup('Request failed, please try again later.');
            };

            // Data to send (can be extended if needed)
            var data = JSON.stringify({
                action: 'sendEmail'
            });

            xhr.send(data);
        });

        function showPopup(message) {
            document.getElementById('popup-message').textContent = message;
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>