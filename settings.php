<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');/><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Future Vault</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: rgba(178, 204, 238, 0.468);
            line-height: 1.6;
        }

       
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff79;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 36px;
            color:rgb(0, 0, 0);
        }

        .section-container {
            margin-bottom: 40px;
            padding: 20px;
            background: #f9f9f9cb;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section-container a {
            text-decoration: none;
            color:rgb(0, 0, 0);
            font-size: 28px;
            font-weight: bold;
            display: block;
            margin-bottom: 15px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            transition: color 0.3s;
        }

        .section-container a:hover {
            color:rgb(13, 13, 13);
        }
       .footer{
        position:relative;
        top:150px;
        bottom:0;
        width:100%;
       }
    </style>
</head>
<?php include('header.php') ?>
    
</header>
<body>
    <div class="container">
        <div class="header">
            <h1>Settings - Future Vault</h1>
        </div>

        <!-- Language Settings Section -->
        <!-- <div class="section-container">
            <a href="languagesettings.php">Language Settings</a>
        </div> -->

        <!-- About Section -->
        <div class="section-container">
            <a href="about.php">About Future Vault</a>
        </div>

        <!-- Support Section -->
        <div class="section-container">
            <a href="./support.php">Support</a>
        </div>

        <!-- Privacy Section -->
        <div class="section-container">
            <a href="./privacy.php">Privacy Policy</a>
        </div>

        <div class="section-container">
            <a href="logout.php">Logout</a>
        </div>

       
    <script>
        function toggleMenu() {
            var menu = document.getElementById("profile-menu");
            menu.classList.toggle("show-menu");
        }
    </script>


    <script>
        const profileIcon = document.getElementById('profile-icon');
        const profileMenu = document.getElementById('profile-menu');

        profileIcon.addEventListener('click', () => {
            profileMenu.classList.toggle('show-menu');
        });

        document.addEventListener('click', (e) => {
            if (!profileIcon.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.classList.remove('show-menu');
            }
        });
    </script>
</body>
</html>
