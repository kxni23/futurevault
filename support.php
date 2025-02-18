<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');/>
    <title>Seller Support - Future Vault</title>
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

        .faq {
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            background-color: #ffffffd1;
            border-radius: 10px;
        }

        .contact {
            background: #f0f4f8;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
    </style>
</head>
<?php include('header.php') ?>
<body>
    <div class="container">
        <h1>Seller Support</h1>
        <p>
            Welcome to the Future Vault Seller Support Page! We are here to assist you with managing your seller account, troubleshooting issues, and maximizing your sales potential.
        </p>

        <h2>Getting Started</h2>
        <ul>
            <li><strong>Registering as a Seller:</strong> Learn how to sign up and create your seller account.</li>
            <li><strong>Listing Products:</strong> Step-by-step instructions to add and manage your product listings.</li>
            <li><strong>Order Management:</strong> How to track and fulfill orders efficiently.</li>
        </ul>

        <h2>Frequently Asked Questions (FAQs)</h2>
        <div class="faq">
            <h3>1. How do I register as a seller?</h3>
            <p>
                Visit the seller signup page and fill in the required details to create your seller account.
            </p>

            <h3>2. How do I manage my products?</h3>
            <p>
                Go to your seller dashboard, where you can add, edit, and remove products anytime.
            </p>

            <h3>3. How are payments processed?</h3>
            <p>
                Payments are processed through our secure system and transferred to your registered bank account weekly.
            </p>
        </div>

        <h2>Contact Our Support Team</h2>
        <div class="contact">
            <p>
                Need help? Reach out to our seller support team anytime.
            </p>
            <ul>
                <li><strong>Email:</strong> sellersupport@futurevault.com</li>
                <li><strong>Phone:</strong> +1-800-987-6543</li>
                <li><strong>Live Chat:</strong> Available on your seller dashboard.</li>
            </ul>
        </div>
    </div>
</body>
</html>
