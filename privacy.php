<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Future Vault</title>
    <style>
      body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: rgb(69, 76, 85);
            line-height: 1.6;
        }

        /* Header styling */
        

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-container h1 {
            margin: 0;
            font-size: 3em;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .header-container p {
            margin: 10px 0;
            font-size: 1.4em;
            font-weight: 300;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
        }

        .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile span {
            color: #4a4a4a;
            font-size: 1.2em;
            font-weight: bold;
        }

        .profile-menu {
            position: absolute;
            top: 70px;
            right: 0;
            background: rgba(255, 255, 255, 0.623);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
            width: 150px;
            text-align: left;
        }

        .profile-menu a {
            text-decoration: none;
            color: #2b2728;
            padding: 10px 15px;
            font-size: 1em;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s ease;
        }

        .profile-menu a:hover {
            background: #f4dfba;
        }

        .show-menu {
            display: flex;
        }
        section {
            background-color: #ffffffac;
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        section h2 {
            color: #235093;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        ul {
            padding-left: 20px;
        }
        ul li {
            margin-bottom: 10px;
        }
        p {
            font-size: 1rem;
            margin-bottom: 15px;
        }
        .contact-info ul {
            list-style-type: none;
            padding-left: 0;
        }
        .contact-info ul li {
            margin-bottom: 10px;
        }
      
    </style>
</head>
<?php include('header.php') ?>
<body>
    <section>
        <h2>1. Introduction</h2>
        <p>Welcome to Future Vault! We value your privacy and are committed to protecting your personal data. This Privacy Policy outlines how we collect, use, and safeguard your information.</p>
    </section>

    <section>
        <h2>2. Information We Collect</h2>
        <ul>
            <li><strong>Personal Information:</strong> Name, email address, date of birth, and other details you provide during registration.</li>
            <li><strong>Stored Content:</strong> Photos, videos, audio files, and any other memories you upload to the platform.</li>
            <li><strong>Usage Data:</strong> Information about how you use our services, including interaction data, preferences, and device information.</li>
        </ul>
    </section>

    <section>
        <h2>3. How We Use Your Information</h2>
        <ul>
            <li>Provide and improve our services.</li>
            <li>Personalize user experience.</li>
            <li>Communicate with you about your account and updates.</li>
            <li>Ensure security and prevent fraud.</li>
            <li>Comply with legal obligations.</li>
        </ul>
    </section>

    <section>
        <h2>4. Sharing Your Information</h2>
        <p>We do not sell your personal information. We may share your data with:</p>
        <ul>
            <li><strong>Service Providers:</strong> Third parties that help us operate and improve our services.</li>
            <li><strong>Legal Authorities:</strong> When required by law or to protect our legal rights.</li>
        </ul>
    </section>

    <section>
        <h2>5. Data Retention</h2>
        <p>We retain your data as long as your account is active or as needed to provide services. You can request deletion of your data at any time.</p>
    </section>

    <section>
        <h2>6. Your Rights and Choices</h2>
        <p>You have the right to:</p>
        <ul>
            <li>Access your data.</li>
            <li>Correct inaccurate or incomplete data.</li>
            <li>Request deletion of your data.</li>
            <li>Opt-out of certain data processing activities.</li>
        </ul>
    </section>

    <section>
        <h2>7. Security Measures</h2>
        <p>We implement industry-standard security measures to protect your data from unauthorized access, alteration, or destruction.</p>
    </section>

    <section>
        <h2>8. Cookies and Tracking</h2>
        <p>We use cookies to enhance your experience. You can manage your cookie preferences through your browser settings.</p>
    </section>

    <section>
        <h2>9. Children's Privacy</h2>
        <p>Our services are not intended for children under 13. We do not knowingly collect personal data from children.</p>
    </section>

    <section>
        <h2>10. Changes to This Privacy Policy</h2>
        <p>We may update this Privacy Policy periodically. We will notify you of significant changes and update the "Effective Date" accordingly.</p>
    </section>

    <section class="contact-info">
        <h2>11. Contact Us</h2>
        <p>If you have any questions about this Privacy Policy, please contact us at:</p>
        <ul>
            <li><strong>Email:</strong> <a href="mailto:support@futurevault.com">support@futurevault.com</a></li>
        
        </ul>
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
