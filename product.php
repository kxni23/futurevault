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

        .shop-name {
            font-size: 28px;
            font-weight: 700;
            color: #fdbf00;
            text-transform: uppercase;
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
<body>
    <header>
        <div class="logo">
            <h1>Future Vault</h1>
        </div>
        <nav>
            <input type="text" id="searchBar" placeholder="Search for memory gifts..." oninput="displayProducts()">
            <select id="categoryFilter" onchange="displayProducts()">
                <option value="all">All Categories</option>
                <option value="digital">Digital</option>
                <option value="physical">Physical</option>
            </select>
        </nav>
    </header>
    <main>
        <section class="products">
           
            <div id="productGrid" class="product-grid"></div>
        </section>
    </main>
    <script>
        const exchangeRate = 83; // USD to INR conversion rate

        const products = [
            { id: 1, name: "Personalized Digital Album", price: 30, image: "album.jpg", category: "digital" },
            { id: 2, name: "Engraved Music Box", price: 25, image: "music-box.jpg", category: "physical" },
            { id: 3, name: "Memory Scrapbook", price: 20, image: "scrapbook.jpg", category: "physical" }
        ];

        function displayProducts() {
            const category = document.getElementById("categoryFilter").value;
            const searchQuery = document.getElementById("searchBar").value.toLowerCase();
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
                    <img src="${product.image}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <div class="price">₹${priceInINR.toLocaleString()}</div>
                    <button onclick="addToVault(${product.id})">Add to Future Vault</button>
                `;

                productGrid.appendChild(productCard);
            });
        }

        function addToVault(productId) {
            alert(`Product ${productId} added to Future Vault!`);
        }

        displayProducts();
    </script>
</body>
</html>