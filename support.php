<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support - Future Vault</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffffa9;
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

        .faq {
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            background-color: #ffffffd1;
            margin: block start 10px; ;
            border-radius: 10px;
        }

        .contact {
            background: #f0f4f8;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .contact h2 {
            margin-top: 0;
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
        
    
    </style>
</head>
<?php include('header.php') ?>
<body>
    <div class="container">
        <h1>Support</h1>
        <p>
            Welcome to the Future Vault Support Page! We are here to assist you with any questions or issues you may have. Whether you need help getting started, troubleshooting a problem, or understanding a feature, our dedicated support team is ready to guide you every step of the way.
        </p>

        <h2>Getting Started</h2>
        <p>
            If you’re new to Future Vault, here are a few resources to help you get started:
        </p>
        <ul>
            <li><strong>Account Creation:</strong> Learn how to sign up and create your Future Vault account.</li>
            <li><strong>Uploading Memories:</strong> Step-by-step instructions on how to upload photos, videos, and audio files.</li>
            <li><strong>Scheduling Unlocks:</strong> Discover how to set dates for your memories to be unlocked.</li>
        </ul>

        <h2>Frequently Asked Questions (FAQs)</h2>
        <div class="faq">
            <h3>1. Is Future Vault secure?</h3>
            <p>
                Absolutely! We use advanced encryption to ensure your memories are stored safely and can only be accessed by you.
            </p>

            <h3>2. What types of files can I upload?</h3>
            <p>
                Future Vault supports images, videos, and audio files in most common formats such as JPEG, PNG, MP4, and MP3.
            </p>

            <h3>3. How do I recover a forgotten password?</h3>
            <p>
                Click on the “Forgot Password” link on the login page and follow the instructions to reset your password securely.
            </p>

            <h3>4. Can I share memories with others?</h3>
            <p>
                Yes, you can customize privacy settings for each memory, allowing you to share specific ones with friends or family.
            </p>

            <h3>5. Is there a limit to how much I can store?</h3>
            <p>
                Storage limits depend on your subscription plan. Check our pricing page for details on available storage options.
            </p>
        </div>

        <h2>Troubleshooting</h2>
        <p>
            Encountering a problem? Here are some quick fixes:
        </p>
        <ul>
            <li><strong>Login Issues:</strong> Ensure you’re using the correct email and password. Clear your browser cache if the problem persists.</li>
            <li><strong>File Upload Errors:</strong> Verify that your file format and size meet the upload requirements. Try refreshing the page.</li>
            <li><strong>Delayed Unlock:</strong> Check your internet connection and ensure your device's date and time are correctly set.</li>
        </ul>

        <h2>Contact Our Support Team</h2>
        <div class="contact">
            <h2>We’re Here to Help</h2>
            <p>
                If you couldn’t find the answer you were looking for, feel free to reach out to our support team. We’re available 24/7 to assist you.
            </p>
            <ul>
                <li><strong>Email:</strong> support@futurevault.com</li>
                <li><strong>Phone:</strong> +1-800-123-4567</li>
                <li><strong>Live Chat:</strong> Access our live chat from the bottom-right corner of the website.</li>
            </ul>
        </div>

        <h2>Feedback</h2>
        <p>
            Your feedback helps us improve! Let us know what you think about Future Vault, and share suggestions or feature requests. Together, we can make Future Vault even better.
        </p>

        
    </div>
</body>

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
