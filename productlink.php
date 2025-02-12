<!DOCTYPE html>
<html>
<head>
    <title>Affiliate Link Generator</title>
    <style>
         * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      flex-direction:column;
    }
        body {
            font-family: Arial, sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            line-height: 1.6;
            text-align: center;
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
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top:125px;
            width:50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #shortLink {
            margin-top: 15px;
            padding: 10px;
            background: #e9ecef;
            border-radius: 5px;
            word-break: break-all;
        }
        .qr-container {
            margin-top: 15px;
        }
    </style>
    <script>
        async function generateAffiliateLink() {
            var productURL = document.getElementById("productURL").value.trim();
            var affiliateID = document.getElementById("affiliateID").value.trim();
            
            if (productURL && affiliateID) {
                var affiliateLink = `${productURL}?aff_id=${affiliateID}`;
                document.getElementById("shortLink").innerText = "Generating short link...";
                
                try {
                    let shortURL = await shortenURL(affiliateLink);
                    document.getElementById("shortLink").innerHTML = `<b>Shortened Link:</b> <a href="${shortURL}" target="_blank">${shortURL}</a>`;
                    generateQRCode(shortURL);
                } catch (error) {
                    document.getElementById("shortLink").innerText = "Error generating short link.";
                }
            } else {
                alert("Please enter both Product URL and Affiliate ID.");
            }
        }

        async function shortenURL(longURL) {
            let response = await fetch(`https://tinyurl.com/api-create.php?url=${encodeURIComponent(longURL)}`);
            return await response.text();
        }

        function generateQRCode(link) {
            var qrContainer = document.getElementById("qrContainer");
            qrContainer.innerHTML = "";
            var img = document.createElement("img");
            img.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(link)}`;
            qrContainer.appendChild(img);
        }
    </script>
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
            
            <a href="settings.php">Settings</a>
            
        </nav>

        <div class="profile">
            <img id="profile-icon" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Icon" onclick="toggleMenu()">
            
            
        </div>
    </header>
    <div class="container">
        <h2>Generate Your Affiliate Product Link</h2>
        <label>Product URL:</label>
        <input type="text" id="productURL" placeholder="Enter product URL">
        <label>Affiliate ID:</label>
        <input type="text" id="affiliateID" placeholder="Enter your affiliate ID">
        <button onclick="generateAffiliateLink()">Generate Link</button>
        
        <div id="shortLink"></div>
        <div id="qrContainer" class="qr-container"></div>
    </div>
</body>
</html>
