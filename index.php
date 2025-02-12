<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Vault</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
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
            text-decoration: none;
            color: #4a4a4a;
            padding: 10px 15px;
            font-size: 0.9em;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s ease;
        }

        .profile-menu a:hover {
            background:rgb(90, 157, 204);
            color: #333;
        }

        .profile:hover .profile-menu {
            display: flex;
        }

        /* Action Icons Below the Header */
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
            background-color: rgba(255, 255, 255, 0.94);
        }

        .action-icons .action-icon i {
            font-size: 3em;
            margin-bottom: 10px;
        }

        /* Descriptions Section */
        .action-icons-description {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 100px;
        }

        .description-box {
            width: 250px;
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .description-box h3 {
            margin-bottom: 15px;
            font-size: 1.5em;
            color: #333;
        }

        .description-box p {
            font-size: 1em;
            color: #666;
        }

        .features {
            padding: 60px 10%;
            text-align: center;
        }

        .features h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #333;
        }

        .features-grid {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .feature-item {
            flex: 1 1 calc(33% - 20px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .feature-item h3 {
            color: #000000;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .feature-item p {
            font-size: 1em;
            color: #666;
        }

        .how-it-works {
            background: rgba(255, 255, 255, 0.86);
            padding: 60px 10%;
            text-align: center;
        }

        .how-it-works h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #333;
        }

        .how-it-works p {
            font-size: 1.2em;
            color: #555;
            margin: 15px 0;
        }
        
        .login-option {
            margin-top: 30px;
            text-align: center;
        }

        .login-option button {
            padding: 15px 30px;
            font-size: 16px;
            background-color: rgba(90, 156, 204, 0.7);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        .login-option button:hover {
            background-color: rgba(67, 114, 177, 0.8);
        }

    </style>
</head>
<body>
<header>
    <div class="header-left">
        <h1>Future Vault</h1>
        <p>Preserve Today, Unlock Tomorrow</p>
    </div>
    <!-- Navigation links -->
    <nav>
        <a href="">Home</a>
  
        <a href="signup.html">User Signup</a>
        <a href="sellersignup.php">Seller Signup</a>
    </nav>
</header>

<!-- Login Option Section -->
<section class="login-option">
    <h2>Select Your Login Type</h2>
    <button onclick="window.location.href='loginn.html'">User Login</button>
    <button onclick="window.location.href='sellerslogin.php'">Seller Login</button>
</section>

<!-- Action Icons Below the Header -->
<section class="action-icons">
    <a href="" class="action-icon">
        <i class="fas fa-lock"></i>
        Create Vault
    </a>
    <a href="" class="action-icon">
        <i class="fas fa-search"></i>
        Explore gifts for you loved ones
    </a>
</section>

<!-- Descriptions Section -->
<section class="action-icons-description">
    <div class="description-box">
        <h3>Create Vault</h3>
        <p>Securely store your memories in a digital vault, ensuring they remain safe and accessible only to you.</p>
    </div>
    <div class="description-box">
        <h3>Explore Memories</h3>
        <p>Browse and unlock your cherished moments, bringing them to life whenever you wish.</p>
    </div>
</section>

<!-- Added Professional Content -->
<section class="features">
    <h2>What Makes Future Vault Unique?</h2>
    <div class="features-grid">
        <div class="feature-item">
            <h3>Time-Locked Memories</h3>
            <p>Save precious moments and set a future date to unlock them, ensuring every memory feels like a gift.</p>
        </div>
        <div class="feature-item">
            <h3>Unparalleled Security</h3>
            <p>Your memories are safeguarded with cutting-edge encryption, ensuring privacy and peace of mind.</p>
        </div>
        <div class="feature-item">
            <h3>Effortless Organization</h3>
            <p>Seamlessly categorize and search your photos, videos, and audio files to revisit them anytime.</p>
        </div>
    </div>
</section>

<section class="how-it-works">
    <h2>How It Works</h2>
    <p>Future Vault allows you to upload and store memories securely, organize them efficiently, and unlock them at your preferred time. With seamless navigation and top-notch encryption, your cherished memories are safe and ready when you need them most.</p>
</section>

<!-- New Professional Content -->
<section class="how-it-works">
    <h2>Why Choose Future Vault?</h2>
    <p>Future Vault isn't just a memory storage solution; it's a platform that offers full control, security, and convenience. Our state-of-the-art encryption ensures that your memories are protected from any external threats, while our easy-to-use interface guarantees you can access your most treasured moments, whenever and wherever you want.</p>
    <p>As part of a growing digital landscape, Future Vault uses the latest advancements in cloud technology to ensure your files remain both secure and accessible at any time.</p>
</section>

<?php include('footer.php') ?>

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
