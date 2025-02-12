<?php 
    include('api/config.php');

    $userid =  $_SESSION["id"];
    
    $sql = "SELECT * FROM persons WHERE id = '$userid'";
    
    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $userInfo = $result->fetch_assoc();

        $username = $userInfo['username'];
        $email = $userInfo['emailID'];
        $imagename = $userInfo['profile_name'];
        $bio = $userInfo['bio'];
        $password = $userInfo['password'];

    } else {
        // Invalid credentials, show an error message
        echo "<script type='text/javascript'>alert('Invalid Username and Password');window.location.href='loginn.html';</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Profile</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: rgba(47, 47, 48, 0.468);
            line-height: 1.6;
        }
       

        /* Icons Below Header */
        .action-icons {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin-top: 40px;
        }

        .action-icons .action-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 1.2em;
            color: #333;
            text-decoration: none;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .action-icons .action-icon:hover {
            transform: translateY(-10px);
            background-color: rgba(178, 204, 238, 0.8);
        }

        .action-icons .action-icon i {
            font-size: 3em;
            margin-bottom: 10px;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffffcb;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Header Section */
        .header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .header h1 {
            font-size: 1.8em;
            margin: 0;
            color: #444;
        }

        .header p {
            color: #666;
            font-size: 1em;
            margin: 5px 0;
        }

        /* Profile Section */
        .profile-details {
            text-align: left;
        }

        .profile-details p {
            font-size: 1em;
            margin: 8px 0;
        }

        .profile-details strong {
            color: #444;
        }

        /* Edit Form Styles */
        .edit-form {
            display: none; /* Hidden by default */
        }

        .edit-form .form-group {
            margin-bottom: 15px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 1em;
        }

        .edit-form input, .edit-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary {
            background-color: #559ce7;
        }

        .btn-primary:hover {
            background-color: #00419195;
        }

        .btn-secondary {
            background-color: #f4f4f4;
            color: #333;
        }

        .btn-secondary:hover {
            background-color: #ddd;
        }

        .action-buttons {
            text-align: center;
            margin-top: 30px;
        }

        /* Change Password and Delete Account */
        .account-options {
            margin-top: 20px;
        }

        .account-options a {
            display: block;
            color: #4385d1;
            text-decoration: none;
            font-size: 1em;
            margin: 5px 0;
        }

        .account-options a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .header img {
                width: 100px;
                height: 100px;
            }

            .header h1 {
                font-size: 1.5em;
            }
        }
        .footer{
        padding:10px;      
        position:relative;
        bottom: 10px;
        top:89px;
            }
    </style>
</head>
<body>
    <?php include('header.php')?>
  
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="api/profile_image/<?php echo $imagename; ?>" alt="Profile Picture">
            <h1><?php echo $username; ?></h1>
            <p><?php echo $email; ?></p>
        </div>

        <!-- Profile Details -->
        <div id="profile-details" class="profile-details">
            <p><strong>Full Name:</strong><?php echo $username; ?></p>
            <p><strong>Email:</strong><?php echo $email; ?></p>
            <p><strong>Bio:</strong> 
                <?php  
                    if (!empty($bio)) {
                        echo $bio;
                    } else {
                        echo "Add a New Bio";
                    }
                ?>
            </p>
            <div class="action-buttons">
                <button class="btn btn-primary" onclick="showEditForm()">Edit Profile</button>
            </div>
        </div>

        <!-- Edit Form -->
        <div id="edit-form" class="edit-form">
            <form action="api/update_profile.php" method="POST" enctype='multipart/form-data'> 
                <div class="form-group">
                    <label for="full-name">Full Name</label>
                    <input type="text" name="fullname" id="full-name" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" rows="3"><?php  
                    if (!empty($bio)) {
                        echo $bio;
                    } else {
                        echo "Add a New Bio";
                    }
                ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" id="image" name="image" value="<?php echo $imagename; ?>">
                </div>
                <div class="action-buttons">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
                </div>
                <div class="account-options">
                    <a href="./changepassword.php">Change Password</a>
                    <a href="./deleteaccount.php">Delete Account</a>
                </div>
            </form>
        </div> 
                
    </div>

    <script>
        function showEditForm() {
            document.getElementById('profile-details').style.display = 'none';
            document.getElementById('edit-form').style.display = 'block';
        }

        function hideEditForm() {
            document.getElementById('profile-details').style.display = 'block';
            document.getElementById('edit-form').style.display = 'none';
        }

        function toggleMenu() {
            var menu = document.getElementById("profile-menu");
            menu.classList.toggle("show-menu");
        }
    </script>
</body>
</html>
