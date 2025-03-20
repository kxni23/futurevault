<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Vault - Explore Our Memory Gifts</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            line-height: 1.6;
            color: #333;
            padding: 0;
            margin: 0;
        }

        /* Header */
        header {
            background-color: white;
            color: black;
            padding: 15px 10%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo h1 {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 1px;
            color: black;
        }

        header nav {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header nav input, header nav select {
            padding: 8px;
            font-size: 14px;
            border: 2px solid #ddd;
            border-radius: 4px;
            outline: none;
            transition: all 0.3s ease;
        }

        header nav input:focus, header nav select:focus {
            border-color: #fdbf00;
        }

        /* Main Content */
        main {
            padding: 30px 8%;
            min-height: 100vh;
        }

        .products h2 {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
            padding-bottom: 50px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 20px;
            transition: all 0.3s ease;
        }

        .product-card {
            background-color: rgba(255, 255, 255, 0.79);
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-card h3 {
            margin: 15px 0;
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        .product-card .price {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
        }

        .product-card button {
            padding: 10px;
            background-color: #1a1a1a;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .product-card button:hover {
            background-color: #333;
        }
    </style>
</head>
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
</style>
<body>
<header>
        <div class="header-left">
            <h1>Future Vault</h1>
            <p>Preserve Today, Unlock Tomorrow</p>
        </div>

        <!-- Navigation links -->
        <nav>
            <a href="homepage.php">HOME</a>
            <a href="selleracc.php">My Account</a>     
           
            
        </nav>
    </header>
   
    <main>
        <section class="products">
            <div id="productGrid" class="product-grid"></div>
        </section>
    </main>
    <script>
        const exchangeRate = 83; // USD to INR conversion rate

        async function fetchProducts() {
            try {
                const response = await fetch('api/products.php'); // Fetch data from the backend API
                const products = await response.json();
                displayProducts(products);
            } catch (error) {
                console.error("Error fetching products:", error);
            }
        }

        function displayProducts(products) {
            const category = document.getElementById("categoryFilter")?.value || "all";
            const searchQuery = document.getElementById("searchBar")?.value.toLowerCase() || "";
            const productGrid = document.getElementById("productGrid");
            productGrid.innerHTML = "";

            const filteredProducts = products.filter(product => 
                (category === "all" || product.category === category) && 
                product.name.toLowerCase().includes(searchQuery)
            );

            filteredProducts.forEach(product => {
                const productCard = document.createElement("div");
                productCard.classList.add("product-card");
                const priceInINR = product.price * exchangeRate;

                productCard.innerHTML = `
                    <img src="api/uploads/${product.photo}" alt="${product.photo}">
                    <h3>${product.name}</h3>
                    <div class="price">₹${priceInINR.toLocaleString()}</div>
                    <button onclick="redirectToProduct('${product.link}')">view product</button>
                `;

                productGrid.appendChild(productCard);
            });
        }

        function redirectToProduct(productLink) {
            window.location.href = productLink;
        }

        fetchProducts(); // Fetch and display products on page load
    </script>
</body>
</html>