<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Performance</title>
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

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            margin-top:90px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .progress-container {
            width: 100%;
            background: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar {
            height: 10px;
            background: #28a745;
        }
    </style>
</head>
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

    </header>
<body>
    <div class="container">
        <h1>Seller Performance</h1>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Clicks</th>
                    <th>Conversions</th>
                    <th>Earnings</th>
                    <th>Conversion Rate</th>
                </tr>
            </thead>
            <tbody id="sellerData"></tbody>
        </table>
    </div>
    
    <script>
        const sellerData = [
            { product: "Vintage Watch", clicks: 120, conversions: 15, earnings: "$75" },
            { product: "Handmade Journal", clicks: 200, conversions: 30, earnings: "$150" },
            { product: "Personalized Mug", clicks: 90, conversions: 10, earnings: "$40" }
        ];
        
        const tableBody = document.getElementById("sellerData");
        
        sellerData.forEach(seller => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${seller.product}</td>
                <td>${seller.clicks}</td>
                <td>${seller.conversions}</td>
                <td>${seller.earnings}</td>
                <td>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: ${(seller.conversions / seller.clicks) * 100}%"></div>
                    </div>
                </td>
            `;
            tableBody.appendChild(row);
        });
    </script>
</body>
</html>