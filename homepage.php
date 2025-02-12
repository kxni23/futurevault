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
        

       
    </style>
</head>
<body>

<?php include('header.php') ?>

        
        
    </header>

    <!-- Action Icons Below the Header -->
    <section class="action-icons">
        <a href="categories.php" class="action-icon">
            <i class="fas fa-lock"></i>
            Create Vault
        </a>
        <a href="categofry.php" class="action-icon">
            <i class="fas fa-search"></i>
            Explore 
        </a>
    </section>

    <!-- Descriptions Section -->
    <section class="action-icons-description">
        <div class="description-box">
            <h3>Create Vault</h3>
            <p>Securely store your memories in a digital vault, ensuring they remain safe and accessible only to you.</p>
        </div>
        <div class="description-box">
            <h3>Explore gifts for your loved ones</h3>
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
