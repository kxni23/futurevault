<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login - Future Vault</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');/><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      flex-direction:column;
    }
        body {
            margin: 0;
       
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
        }

        header {
            background: #fff;
            color: #333;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            flex-direction:row;
        }

        .header-left {
            display: flex;
            flex-direction: column;
        }

        header h1 {
            margin: 0;
            font-size: 1.4em;
            font-weight: bold;
            letter-spacing: 2px;
            color: #333;
        }

        header p {
            margin: 0;
            font-size: 0.9em;
            font-weight: 300;
            color: #555;
        }

        nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 1em;
            padding: 10px 15px;
            transition: background 0.3s, color 0.3s ease;
            border-radius: 5px;
        }

        nav a:hover {
            background:rgba(90, 156, 204, 0.71);
            color: #333;
        }

        /* Profile Section */
        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            cursor: pointer;
        }

        .profile img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .profile img:hover {
            transform: scale(1.1);
        }

        .profile-menu {
            position: absolute;
            top: 55px;
            right: 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
            width: 150px;
            text-align: left;
            z-index: 100;
        }

        .profile-menu a {
            textborder-bottom: 1px solid #ddd;
            transition: background 0.3s ease;
        }

        .profile-menu a:hover {
            background:rgb(90, 157, 204);
            color: #333;
        }

        .profile:hover .profile-menu {
            display: flex;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            padding: 20px;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .login-box h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin-bottom: 20px;
            color:#000;
        }

        .login-box input[type="text"], 
        .login-box input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #171a18d1;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .login-box button {
            background-color: #71a7cb;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-box button:hover {
            background-color: #85bfc8a2;
        }

        .signup-link {
            margin-top: 15px;
            font-size: 14px;
            color: #1a1919;
        }

        .signup-link a {
            color: #191717;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .back-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.5em;
            color: #4a4a4a;
            cursor: pointer;
        }

        .footer {
            color: #000;
            background: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 5%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer p {
            margin: 0;
            font-size: 0.9em;
            color: #333;
        }
    </style>
</head>
<body>

    <header>
        <div class="header-left">
            <h1>Future Vault</h1>
            <p>Your memories, safely preserved.</p>
        </div>
        <nav>
            <a href="index.php">Home</a>
           
        </nav>
    </header>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-box">
            <h2>Seller Login</h2>
            <form action="./api/sellerlogin.php" method="POST">
                <input type="text" name="username" placeholder="Enter Username" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <button type="submit">LOGIN</button>
            </form>

            <div class="signup-link">
                <p>New seller? <a href="sellersignup.php">Sign up here</a></p>
            </div>
        </div>
    </div>


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
