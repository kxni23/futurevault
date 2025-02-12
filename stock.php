<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            width: 90%;
            margin: auto;
            background-color:rgba(255, 255, 255, 0.75);
            padding: 20px;
            border-radius: 10px;
         margin-top:67px;
            height:500px;
       
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width:50%;
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
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
        background-color: #007bff;
            color: white;
        }
        .column {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<header>
    <div class="header-left">
        <h1>Future Vault</h1>
        <p>Preserve Today, Unlock Tomorrow</p>
    </div>
    <nav>
        <a href="sellerdashboard.php">Dashboard</a>
        <a href="selleracc.php">My Account</a>    
        <a href="settings.php">Settings</a>         
    </nav>
    <div class="profile">
        <img id="profile-icon" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Icon">
    </div>
</header>
<div class="container">
    <h2>Product List</h2>
    <div class="column">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName">
        <label for="productPrice">Price:</label>
        <input type="text" id="productPrice">
        <label for="productLink">Product Link:</label>
        <input type="text" id="productLink">
        <button id="addProductBtn">Add Product</button>
    </div>
    <br>
    <table id="productTable">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Link</th>
        </tr>
    </table>
</div>
<script>
    $(document).ready(function () {
        loadProducts();

        $("#addProductBtn").click(function () {
            var name = $("#productName").val();
            var price = $("#productPrice").val();
            var link = $("#productLink").val();

            if (name && price && link) {
                $.ajax({
                    url: "add_product.php",
                    type: "POST",
                    data: {
                        action: "add",
                        name: name,
                        price: price,
                        link: link
                    },
                    success: function (response) {
                        alert(response);
                        loadProducts();
                        $("#productName, #productPrice, #productLink").val("");
                    }
                });
            } else {
                alert("Please fill all fields");
            }
        });
    });

    function loadProducts() {
        $.ajax({
            url: "add_product.php",
            type: "GET",
            success: function (response) {
                $("#productTable tr:not(:first)").remove();
                var products = JSON.parse(response);
                products.forEach(function (product) {
                    $("#productTable").append(
                        `<tr><td>${product.name}</td><td>${product.price}</td><td><a href='${product.link}' target='_blank'>View</a></td></tr>`
                    );
                });
            }
        });
    }
</script>
</body>
</html>
