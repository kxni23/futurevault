<?php 
header('Content-Type: application/json'); // Ensure JSON response

include 'api/config.php'; // Include database connection

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_name = trim($_POST['business_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); // Secure password
    $phone = trim($_POST['phone']);
    $business_address = trim($_POST['business_address']);
    $website_link = trim($_POST['website_link']);
    $created_at = date("Y-m-d H:i:s"); // Current timestamp

    // Generate a unique seller ID in the format "SEL123456"
    do {
        $random_number = rand(100000, 999999);
        $seller_id = "SEL" . $random_number;
        
        // Check if the generated seller_id already exists
        $checkStmt = $conn->prepare("SELECT seller_id FROM sellers WHERE seller_id = ?");
        $checkStmt->bind_param("s", $seller_id);
        $checkStmt->execute();
        $checkStmt->store_result();
    } while ($checkStmt->num_rows > 0);
    $checkStmt->close();

    // Prepare and execute the insert query
    $stmt = $conn->prepare("INSERT INTO sellers (seller_id, business_name, username, email, password, phone, business_address, website_link, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssssssss", $seller_id, $business_name, $username, $email, $password, $phone, $business_address, $website_link, $created_at);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Seller registered successfully!";
            $response['seller_id'] = $seller_id; // Return generated seller ID
        } else {
            $response['success'] = false;
            $response['error'] = "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $response['success'] = false;
        $response['error'] = "Error in preparing the statement: " . $conn->error;
    }

    $conn->close();
} else {
    $response['success'] = false;
    $response['error'] = "Invalid request method.";
}

// Send JSON response
echo json_encode($response);
exit;
?>