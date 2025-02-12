<?php

include('config.php');

// Set the directory to save uploaded files
$uploadDirectory = __DIR__ . '/uploads/'; // Assuming a directory named 'uploads' in the same directory as this script

// Check if the directory exists, and create it if it doesn't
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_POST['category'];

    $brand = $_POST['brand'];

    $parts = $_POST['parts'];

    $product_name = $_POST['product_name'];

    $image_name = $_FILES['image']['name'];


    $sql = "INSERT INTO tablename (category, brand, parts, product_name,image_name) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $category, $brand, $parts, $product_name, $image_name);

    if ($stmt->execute()) {
        // Move the uploaded file to the specified directory
        $uploadedFilePath = $uploadDirectory . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath);


        echo "<script type='text/javascript'>alert('Success');window.location.href='#';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
