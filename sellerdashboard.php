<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Dashboard - Affiliate Marketing</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      flex-direction:column;
    }

    body {
      font-family: 'Arial', sans-serif;
      background: url('./download\ \(1\).jpg') no-repeat center center/cover;
      color: #333;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
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
            flex-direction:row;
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


   
    /* Main Content Area */
    main {
      padding: 30px;
    }

    section {
      background-color:  rgba(255, 252, 252, 0.87);
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      padding: 63px;
    }

    h1, h2 {
      color: #2c3e50;
      margin-bottom: 15px;
    }

    /* Dashboard Cards */
    .dashboard-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
    }

    .card {
      background-color:rgba(236, 240, 241, 0.89);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      text-align: center;
      cursor: pointer;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .card h2 {
      margin-bottom: 10px;
      font-size: 20px;
      color: #34495e;
    }

    .card p {
      font-size: 14px;
      color: #7f8c8d;
    }

    /* Form Styling */
    form {
      margin-top: 20px;
    }

    input[type="text"], input[type="number"], textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #2c3e50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #34495e;
    }

    /* Footer */
    footer {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 15px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      font-size: 28px;
      font-weight: bold;
      text-decoration: none;
      float: right;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
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
            <a href="sellerdashboard.php">Dashboard</a>
            <a href="selleracc.php">My Account</a>     
           
            
        </nav>

        <div class="profile">
            <img id="profile-icon" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Icon" onclick="toggleMenu()">
            <span><?php echo $username; ?></span>
            
        </div>
    </header>
  <!-- Header -->
 

  <!-- Main Content -->
  <main>
    <section>
      <h1>Welcome to seller Dashboard!</h1>
    
      <!-- Dashboard Cards for each section -->
      <div class="dashboard-cards">
        <div class="card" onclick="window.location.href='productlink.php'">
          <h2>Product Links</h2>
          <p>Generate and manage your affiliate product links.</p>
        </div>
        <div class="card" onclick="window.location.href='stock.php'">
          <h2>Stock Update</h2>
          <p>Track your stock.</p>
        </div>
        <div class="card" onclick="window.location.href='performance.php'">
          <h2>Performance</h2>
          <p>View detailed analytics on your product link performance.</p>
        </div>
        
        <div class="card" onclick="window.location.href='support.php'">
          <h2> Reports</h2>
          <p>Manage your account details and preferences.</p>
        </div>
        <div class="card" onclick="window.location.href='logoutsel.php'">
          <h2> logout</h2>
          <p>Logout your account.</p>
        </div>
      </div>

  

     
  </main>

  <!-- Modal for adding a new product link -->
  <div id="product-link-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2>Enter Product Link</h2>
      <input type="text" id="product-link" placeholder="Enter Product Link" required>
      <button onclick="addProductLink()">Add Link</button>
    </div>
  </div>

  <!-- Footer -->
  

  <script>
    // Local storage simulation for storing data
    function saveData(key, data) {
      localStorage.setItem(key, JSON.stringify(data));
    }

    function getData(key) {
      return JSON.parse(localStorage.getItem(key)) || [];
    }

    // Display product links in the dashboard
    function displayProductLinks() {
      const productLinks = getData("productLinks");
      const productLinksList = document.getElementById("product-links-list");
      productLinksList.innerHTML = "";
      productLinks.forEach(link => {
        const li = document.createElement("li");
        li.textContent = link;
        productLinksList.appendChild(li);
      });
    }

    // Modal functionality for adding new product link
    function showModal() {
      document.getElementById("product-link-modal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("product-link-modal").style.display = "none";
    }

    // Add new product link
    function addProductLink() {
      const link = document.getElementById("product-link").value;
      if (link) {
        const productLinks = getData("productLinks");
        productLinks.push(link);
        saveData("productLinks", productLinks);
        displayProductLinks();
        closeModal();
      }
    }

    // Handle Promotion Form submission
    document.getElementById("promotion-form").addEventListener("submit", function(e) {
      e.preventDefault();
      const promoName = document.getElementById("promo-name").value;
      const promoDiscount = document.getElementById("promo-discount").value;
      const promoDescription = document.getElementById("promo-description").value;

      // Save the promotion data (simulated here)
      console.log("Promotion Created:", promoName, promoDiscount, promoDescription);
      alert("Promotion Created!");
    });

    // Display links on page load
    window.onload = function() {
      displayProductLinks();
    };
  </script>
</body>
</html>
