<?php 
include('api/config.php');
$userid = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #46b6ea;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #46b6ea81;
        }

        .forgot-password {
            text-align: center;
            font-size: 0.9em;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #2e282c;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .reset-password-form {
            display: none;
        }

        .footer {
            position: relative;
            top: 95px;
            bottom: 0;
        }

        #message {
            margin: 10px 0;
            font-size: 0.9em;
        }
       
    </style>
</head>
<body>
<?php include('header.php') ?>

    <div class="container">
        <h2 id="formTitle">Change Password</h2>
        <div id="message"></div>
        <form  id="changePasswordForm" >
            <input type="password" id="currentpass" placeholder="Current Password" required>
            <input type="password" id="newpass" placeholder="New Password" required>
            <input type="password" id="oldpass" placeholder="Confirm New Password" required>
            <button type="submit">Update Password</button>
        </form>

        <div class="forgot-password" id="forgotPasswordLink">
            <p><a href="javascript:void(0);" onclick="showResetPasswordForm()">Forgot Password?</a></p>
        </div>

        <div class="reset-password-form" id="resetPasswordForm">
            <h2></h2>
            <form id="resetPassword" >
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">Send Reset Link</button>
            </form>
            <div class="forgot-password">
                <p><a href="javascript:void(0);" onclick="showChangePasswordForm()">Back to Change Password</a></p>
            </div>
        </div>
    </div>

    <script>
        function showResetPasswordForm() {
            document.getElementById('changePasswordForm').style.display = 'none';
            document.getElementById('forgotPasswordLink').style.display = 'none';
            document.getElementById('resetPasswordForm').style.display = 'block';
            document.getElementById('formTitle').innerText = 'Reset Password';
        }

        function showChangePasswordForm() {
            document.getElementById('changePasswordForm').style.display = 'block';
            document.getElementById('forgotPasswordLink').style.display = 'block';
            document.getElementById('resetPasswordForm').style.display = 'none';
            document.getElementById('formTitle').innerText = 'Change Password';
        }

        

        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const currentPassword = document.querySelector('#changePasswordForm input:nth-child(1)').value;
            const newPassword = document.querySelector('#changePasswordForm input:nth-child(2)').value;
            const confirmPassword = document.querySelector('#changePasswordForm input:nth-child(3)').value;
            const messageElement = document.getElementById('message');

            messageElement.textContent = '';
            messageElement.style.color = 'red';

            // Validation checks
            if (newPassword === currentPassword) {
                messageElement.textContent = "New password cannot be the same as the current password.";
                return;
            }

            const passwordCondition = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordCondition.test(newPassword)) {
                messageElement.textContent = "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
                return;
            }

            if (newPassword !== confirmPassword) {
                messageElement.textContent = "New password and confirm password do not match.";
                return;
            }   

            const userId = <?php echo $userid; ?>; 

            fetch('api/changepassword.php', {
                
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                    // No Authorization header needed if the session is used for authentication
                },
                body: JSON.stringify({
                    userId: userId,
                    currentPassword: currentPassword,
                    newPassword: newPassword
                }),
                credentials: 'same-origin'  // This ensures cookies (if using session-based authentication) are included with the request
            })
            .then(response => response.json())
            .then(data => {
                const messageElement = document.getElementById('message');
                    if (data.success) {
                        messageElement.style.color = 'green';
                        messageElement.textContent = data.message;
                        
                        // Refresh the page after a successful update
                        setTimeout(function() {
                            location.reload(); // Refresh the page
                        }, 1500); // Wait for 1.5 seconds before refreshing
                    } else {
                        messageElement.style.color = 'red';
                        messageElement.textContent = data.message || "An error occurred. Please try again.";
                    }
                })
            .catch(error => {
                messageElement.style.color = 'red';
                messageElement.textContent = "There was an error with the password update request.";
            });
        });


        document.getElementById('resetPassword').addEventListener('submit', function(event) {
            event.preventDefault();
            const messageElement = document.getElementById('message');
            messageElement.style.color = 'green';
            messageElement.textContent = "Password reset link sent. Please check your email.";
            // Add logic to send the reset link to the user's email here
        });

        function toggleMenu() {
            var menu = document.getElementById("profile-menu");
            menu.classList.toggle("show-menu");
        }
    </script>


</body>
</html>
