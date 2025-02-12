<?php
// Function to validate the URL
function validateURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Function to validate phone number (10 digits)
function validatePhone($phone) {
    return preg_match('/^[0-9]{10}$/', $phone);
}

// Function to generate a unique Seller ID
function generateSellerID() {
    return "SELLER" . rand(10000, 99999);
}

$response = array("status" => "error", "message" => "");

// Check if the form data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $businessName = isset($_POST['businessName']) ? trim($_POST['businessName']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $businessAddress = isset($_POST['businessAddress']) ? trim($_POST['businessAddress']) : '';
    $websiteLink = isset($_POST['websiteLink']) ? trim($_POST['websiteLink']) : '';
    $businessLink = isset($_POST['businessLink']) ? trim($_POST['businessLink']) : '';

    // Validate required fields
    if (empty($businessName)) {
        $response["message"] = "Business Name is required.";
    } elseif (empty($username)) {
        $response["message"] = "Username is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "Enter a valid email address.";
    } elseif (!preg_match('/^(?=.*[0-9])(?=.*[\W_]).{8,}$/', $password)) {
        $response["message"] = "Password must be at least 8 characters long and contain 1 number & 1 special character.";
    } elseif (!validatePhone($phone)) {
        $response["message"] = "Phone number must be 10 digits.";
    } elseif (empty($businessAddress)) {
        $response["message"] = "Business Address is required.";
    } elseif (!empty($websiteLink) && !validateURL($websiteLink)) {
        $response["message"] = "Enter a valid website URL.";
    } elseif (empty($websiteLink) && !empty($businessLink) && !validateURL($businessLink)) {
        $response["message"] = "Enter a valid social media or business link.";
    } else {
        // All validations passed, process the registration

        // Generate a unique seller ID
        $sellerID = generateSellerID();

        // Here you can insert data into a database (for example: MySQL)
        // Example SQL: 
        $query = "INSERT INTO sellers (business_name, username, email, password, phone, business_address, website_link, business_link) VALUES ('$businessName', '$username', '$email', '$password', '$phone', '$businessAddress', '$websiteLink', '$businessLink')";

        // For now, returning the success response with the seller ID
        $response["status"] = "success";
        $response["message"] = "Registration Successful!";
        $response["sellerId"] = $sellerID;
    }
} else {
    $response["message"] = "Invalid request method.";
}

// Send JSON response back to the frontend
header('Content-Type: application/json');
echo json_encode($response);
?>
