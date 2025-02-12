<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subscription Plans</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: url('./download\ \(1\).jpg') no-repeat center center/cover;
    }
    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 120px;
      max-width: 1200px;
      margin: auto;
    }
    .card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }
    .card p {
      font-size: 1.25rem;
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
    }
    .card ul {
      list-style: none;
      padding: 0;
      margin-bottom: 20px;
    }
    .card ul li {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 8px;
    }
    .button {
      display: inline-block;
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<?php include ('header.php')?>
<body>
  <div class="container">
    
    <div class="card">
      <h3>Basic Plan</h3>
      <p>₹99/month</p>
      <ul>
        <li>5 GB Storage</li>
        <li>100 MB max upload size</li>
        <li>Photos, Audio, Videos</li>
        <li>Unlimited memories unlock</li>
        <li>Enhanced security</li>
        <li>Ad-free</li>
      </ul>
      <a href="payment.php" class="button">Subscribe</a>
    </div>
    <div class="card">
      <h3>Premium Plan</h3>
      <p>₹199/month</p>
      <ul>
        <li>50 GB Storage</li>
        <li>1 GB max upload size</li>
        <li>Photos, Audio, Videos</li>
        <li>Unlimited memories unlock</li>
        <li>Advanced security</li>
        <li>Automated cloud backups</li>
        <li>Customizable memories</li>
      </ul>
      <a href="payment.php" class="button">Subscribe</a>
    </div>
    <div class="card">
      <h3>Ultimate Plan</h3>
      <p>₹499/month</p>
      <ul>
        <li>Unlimited Storage</li>
        <li>5 GB max upload size</li>
        <li>Photos, Audio, Videos</li>
        <li>Unlimited memories unlock</li>
        <li>Advanced security</li>
        <li>Automated cloud backups with retrieval history</li>
        <li>Customizable themes and tags</li>
        <li>Priority support</li>
      </ul>
      <a href="payment.php" class="button">Subscribe</a>
    </div>
  </div>
</body>
</html>
