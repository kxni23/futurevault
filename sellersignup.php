<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Vault - Seller Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background: #fff;
            color: #333;
            padding: 1px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            flex-direction: row;


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
            flex-direction: row;
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
            background: rgba(90, 156, 204, 0.71);
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
            background: rgb(90, 157, 204);
            color: #333;
        }

        .profile:hover .profile-menu {
            display: flex;
        }


        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            color: #333;
        }

        input,
        button,
        select {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            display: none;
            text-align: left;
            margin-left: 20px;
        }

        .success-message {
            margin-top: 20px;
            padding: 15px;
            background: #e9f7e9;
            border: 1px solid #4CAF50;
            color: #2e7d32;
            border-radius: 5px;
            display: none;
        }

        .seller-id {
            font-weight: bold;
            color: #007bff;
            font-size: 20px;
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
        <a href="profifepage.php">My Accou2nt</a>

        <a href="settings.php">Settings</a>

    </nav>

    <div class="profile">
        <img id="profile-icon" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Icon" onclick="toggleMenu()">

    </div>
</header>

<body>

    <div class="container">
        <h2>Create Your Seller Account</h2>
        <form id="sellerForm">
            <input type="text" id="businessName" placeholder="Enter Business Name" name="businessName">
            <p class="error" id="businessNameError">Business Name is required.</p>

            <input type="text" id="username" placeholder="Enter Username" name="username">
            <p class="error" id="usernameError">Username is required.</p>

            <input type="email" id="email" placeholder="Enter Email" name="email">
            <p class="error" id="emailError">Enter a valid email address.</p>

            <input type="password" id="password" placeholder="Enter Password" name="password">
            <p class="error" id="passwordError">Password must be at least 8 characters long and contain 1 number & 1 special character.</p>

            <input type="tel" id="phone" placeholder="Phone Number" name="phone">
            <p class="error" id="phoneError">Phone number must be 10 digits.</p>

            <input type="text" id="businessAddress" placeholder="Enter Business Address" name="businessAddress">
            <p class="error" id="businessAddressError">Business Address is required.</p>

            <input type="url" id="websiteLink" placeholder="Enter Website Link" name="websiteLink">
            <p class="error" id="websiteError">Enter a valid website URL.</p>
            
            <input type="url" id="businessLink" placeholder="Enter Business/Social Media Link" name="businessLink" style="display: none;">
            <p class="error" id="businessLinkError">Enter a valid social media or business link.</p>

            <button type="submit">Sign Up</button>
        </form>


        <div class="success-message" id="successMessage">
            <p>🎉 Registration Successful! Your unique Seller ID is:</p>
            <p class="seller-id" id="sellerId"></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#sellerForm").submit(function(e) {
                e.preventDefault(); // Prevent normal form submission

                $.ajax({
                    url: "sellersignupp.php", // PHP file to handle the form data
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            $("#sellerId").text(response.sellerId);
                            $("#successMessage").show();
                            $("#sellerForm")[0].reset(); // Reset form fields
                            setTimeout(() => {
                                alert(response.message);
                                window.location.href = "sellerdashboard.php"; // Redirect after success
                            }, 2000); // Redirect after 2 seconds
                        } else {
                            alert(response.message); // Show error message
                        }
                    },

                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("An unexpected error occurred.");
                    }
                });
            });
        });
    </script>

    <div>
        <script>
            // Toggle profile menu visibility
            const profileIcon = document.getElementById('profile-icon');
            const profileMenu = document.getElementById('profile-menu');

            profileIcon.addEventListener('click', () => {
                profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
            });

            // Hide profile menu when clicking outside of it
            document.addEventListener('click', (e) => {
                if (!profileIcon.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.style.display = 'none';
                }
            });
        </script>
    </div>
</body>

</html>