<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Future Vault</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
        }

       
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff94;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #4a90e2;
            margin-bottom: 20px;
        }

        h2 {
            color: #444;
            margin-top: 30px;
            font-size: 28px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        ul {
            margin: 20px 0;
            padding: 0 20px;
        }

        ul li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .highlight {
            color: #4a90e2;
            font-weight: bold;
        }

        .cta {
            text-align: center;
            margin-top: 30px;
        }

        .cta a {
            text-decoration: none;
            color: white;
            background: #4a90e2;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            transition: background 0.3s;
        }

        .cta a:hover {
            background: #357ab7;
        }
        footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 0.9em;
        }

        
    </style>
</head>
<?php include('header.php') ?>
<body>
    <div class="container">
        <h1>About Future Vault</h1>
        <p>
            At <span class="highlight">Future Vault</span>, we believe that memories are treasures, and preserving them is the key to unlocking emotions, nostalgia, and joy in the future. 
            Our mission is to create a platform where individuals can safely store their precious moments and revisit them when the time is right.
        </p>

        <h2>What is Future Vault?</h2>
        <p>
            Future Vault is a memory-preserving platform designed to help you capture, store, and schedule the release of your most cherished memories. 
            Whether it’s a photo, video, audio clip, or even a handwritten note, Future Vault ensures your memories are kept safe until you’re ready to unlock them.
        </p>

        <h2>Key Features</h2>
        <ul>
            <li><span class="highlight">Secure Storage:</span> Store your photos, videos, and audio files in a highly secure and encrypted environment.</li>
            <li><span class="highlight">Scheduled Unlocking:</span> Set a specific date and time to unlock your memories, adding a touch of surprise and anticipation.</li>
            <li><span class="highlight">Custom Categorization:</span> Organize your memories into folders and tags for easy access and better management.</li>
            <li><span class="highlight">Multi-Device Sync:</span> Access your vault seamlessly from any device, anytime, anywhere.</li>
            <li><span class="highlight">Privacy Controls:</span> Decide who can view your memories and manage your privacy settings effortlessly.</li>
        </ul>

        <h2>Who Can Use Future Vault?</h2>
        <p>
            Future Vault is designed for anyone who values their memories and wishes to preserve them. It’s perfect for:
        </p>
        <ul>
            <li><span class="highlight">Individuals:</span> Store personal milestones, family moments, or a diary of your life.</li>
            <li><span class="highlight">Families:</span> Create a collective vault to document shared memories and traditions.</li>
            <li><span class="highlight">Organizations:</span> Safeguard important events, anniversaries, and achievements.</li>
        </ul>

        <h2>Our Commitment</h2>
        <p>
            At Future Vault, we are committed to delivering a user-friendly platform that prioritizes security, privacy, and innovation. 
            We continuously strive to enhance our services and ensure that your memories are protected for generations to come.
        </p>

        <h2>Why Choose Future Vault?</h2>
        <p>Here’s why thousands of users trust Future Vault:</p>
        <ul>
            <li><span class="highlight">State-of-the-Art Encryption:</span> Your memories are encrypted and accessible only by you.</li>
            <li><span class="highlight">User-Centric Design:</span> Easy-to-navigate interface for a hassle-free experience.</li>
            <li><span class="highlight">Reliable Backup:</span> Your data is stored in multiple locations to ensure zero data loss.</li>
            <li><span class="highlight">Continuous Innovation:</span> Regular updates and new features to meet your evolving needs.</li>
        </ul>
    </div>
</body>
<script>
    function toggleMenu() {
        var menu = document.getElementById("profile-menu");
        menu.classList.toggle("show-menu");
    }
</script>
<style>
    
    footer{
    color: #000;
    background: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
   
    }
</style>

<footer>
<div class="footer">
<h2>Connect With Us</h2>
        <!-- <p>Stay in touch with Fut<div class="social-icons">…</div>ure Vault and keep your memories safe.</p> -->
        <div class="social-icons">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p>&copy; 2025 Future Vault. All Rights Reserved.</p>
</div>
    </footer>
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

</html>
