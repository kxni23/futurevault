<?php
include('config.php');
header("Content-Type: application/json");

$query = "SELECT id, name, price, link, photo FROM products";
$result = mysqli_query($conn, $query);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;     
}

mysqli_free_result($result);
mysqli_close($conn);

echo json_encode($products);
?>