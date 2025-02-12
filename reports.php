<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Report Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea, button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report an Issue</h2>
        <form action="/submit_report" method="POST">
            <label for="sellerName">Seller Name:</label>
            <input type="text" id="sellerName" name="sellerName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="orderID">Order ID (if applicable):</label>
            <input type="text" id="orderID" name="orderID">

            <label for="issue">Describe the Issue:</label>
            <textarea id="issue" name="issue" rows="5" required></textarea>

            <button type="submit">Submit Report</button>
        </form>
    </div>
</body>
</html>
