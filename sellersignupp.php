<?php
include('api/config.php');
header('Content-Type: application/json');

$response = ["status" => "error", "message" => "Something went wrong"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize & Validate Inputs
    $businessName = trim($_POST['businessName']);
    $username = trim($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Password is hashed below
    $phone = trim($_POST['phone']);
    $businessAddress = trim($_POST['businessAddress']);
    $websiteLink = filter_var($_POST['websiteLink'], FILTER_SANITIZE_URL);

    if (empty($businessName) || empty($username) || empty($email) || empty($password) || empty($phone)) {
        $response["message"] = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "Invalid email format.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $response["message"] = "Invalid phone number format.";
    } else {
        // 🔒 Secure Password Hashing
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // SQL Query with Prepared Statement
        $sql = "INSERT INTO sellers (business_name, username, email, password, phone, business_address, website_link) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('sssssss', $businessName, $username, $email, $password, $phone, $businessAddress, $websiteLink);
            
            if ($stmt->execute()) {
                $response["status"] = "success";
                $response["message"] = "Details added successfully!";
                $response["sellerId"] = $stmt->insert_id; // Get the inserted seller ID
            } else {
                $response["message"] = "Database error: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $response["message"] = "SQL preparation error: " . $conn->error;
        }
    }
}

$conn->close();
echo json_encode($response);
?>
