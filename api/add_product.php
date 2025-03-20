<?php
$servername = "localhost";
$username = "root"; // Change if necessary
$password = "1234";
$dbname = "futurevault"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request (Adding product)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "add") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $link = $_POST["link"];

    // Handle file upload
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $target_dir = "uploads/"; // Make sure this folder exists and has write permissions
        $photo_name = basename($_FILES["photo"]["name"]);

        echo $photo_name;
        $target_file = $target_dir . $photo_name;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO products (name, price, link, photo) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdss", $name, $price, $link, $photo_name);

            if ($stmt->execute()) {
                echo "Product added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }
}

// Handle GET request (Fetching products)
elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = [];

    while ($row = $result->fetch_assoc()) {
        // Append full image URL if needed
        $row["photo"] = "uploads/" . $row["photo"];
        $products[] = $row;
    }
    echo json_encode($products);
}

$conn->close();
?>
