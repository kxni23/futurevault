<?php
$servername = "localhost";
$username = "root"; // Change if necessary
$password = "1234";
$dbname = "futurevault"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "add") {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $link = $_POST["link"];

        $sql = "INSERT INTO products (name, price, link) VALUES ('$name', '$price', '$link')";
        echo ($conn->query($sql) === TRUE) ? "Product added successfully" : "Error: " . $conn->error;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
}

$conn->close();
?>
