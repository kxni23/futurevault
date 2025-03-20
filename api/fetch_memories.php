<?php
include('config.php');

header('Content-Type: application/json'); // Ensure JSON response
error_reporting(E_ALL);
ini_set('display_errors', 1);



if (!isset($_GET['cat']) || empty($_GET['cat'])) {
    echo json_encode(["error" => "Missing category parameter"]);
    exit;
}

$category = mysqli_real_escape_string($conn, $_GET['cat']);



$sql = "SELECT * FROM memory WHERE category = '$category'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . mysqli_error($conn)]);
    exit;
}

$memories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $memories[] = $row;
}

if (empty($memories)) {
    echo json_encode(["error" => "No memories found for this category"]);
} else {
    echo json_encode(["success" => true, "data" => $memories]);
}

mysqli_close($conn);
?>