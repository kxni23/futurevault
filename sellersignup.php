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
            font-family: 'ribeye';
        }
 
        body { 
            background-color: #f9f9f9;
            text-align: center;
        }

        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        input,
        button {
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

        .success-message {
            margin-top: 20px;
            padding: 15px;
            background: #e9f7e9;
            border: 1px solid #4CAF50;
            color: #2e7d32;
            border-radius: 5px;
            display: none;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Seller Account</h2>
        <form id="sellerForm">
            <input type="text" name="business_name" placeholder="Enter Business Name" required>
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <input type="text" name="business_address" placeholder="Enter Business Address" required>
            <input type="url" name="website_link" placeholder="Enter Website Link">
            <button type="submit">Sign Up</button>
        </form>
        <div class="success-message" id="successMessage"></div>
        <div class="error-message" id="errorMessage"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sellerForm").submit(function(event) {
                event.preventDefault(); // Prevent default form submission
                
                $.ajax({
                    url: "sellersignupp.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        console.log("Success Response:", response);
                        if (response.success) {
                            $("#successMessage").text(response.message + " Your Seller ID: " + response.seller_id).show();
                            $("#errorMessage").hide();
                        } else {
                            $("#errorMessage").text(response.error).show();
                            $("#successMessage").hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", xhr.responseText);
                        $("#errorMessage").text("An unexpected error occurred. Please try again.").show();
                        $("#successMessage").hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
