<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_POST['category'];

    $brand = $_POST['brand'];

    $parts = $_POST['parts'];


    $sql = "INSERT INTO tablename (category, brand, parts) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $category, $brand, $parts);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Success');window.location.href='#';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
