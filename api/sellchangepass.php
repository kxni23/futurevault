<?php
include('config.php');

// Validate if seller is logged in
if (!isset($_SESSION['seller_id'])) {
    echo json_encode(['success' => false, 'message' => 'Seller not logged in']);
    exit;
}

$sellerId = $_SESSION['seller_id'];
$data = json_decode(file_get_contents('php://input'), true);

// Fetch the current password, new password, and confirm password from the request
$currentPassword = $data['currentPassword'];
$newPassword = $data['newPassword'];

// Get the seller's stored password from the database
$sql = "SELECT password FROM sellers WHERE seller_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $sellerId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo json_encode(['success' => false, 'message' => 'Seller not found']);
    exit;
}

$seller = mysqli_fetch_assoc($result);
$storedPassword = $seller['password'];

// Verify the current password with the stored password (assuming passwords are hashed)
if (!password_verify($currentPassword, $storedPassword)) {
    echo json_encode(['success' => false, 'message' => 'Current password is incorrect']);
    exit;
}

// Validate the new password (check for minimum length, uppercase, special character, etc.)
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newPassword)) {
    echo json_encode(['success' => false, 'message' => 'Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a number, and a special character.']);
    exit;
}

// If the new password matches the old one, don't allow the change
if (password_verify($newPassword, $storedPassword)) {
    echo json_encode(['success' => false, 'message' => 'New password cannot be the same as the current password.']);
    exit;
}

// Hash the new password before updating it
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

// Update the password in the database
$updateSql = "UPDATE sellers SET password = ? WHERE seller_id = ?";
$updateStmt = mysqli_prepare($conn, $updateSql);
mysqli_stmt_bind_param($updateStmt, "si", $newPassword, $sellerId);

if (mysqli_stmt_execute($updateStmt)) {
    echo json_encode(['success' => true, 'message' => 'Password updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'An error occurred while updating the password']);
}

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_stmt_close($updateStmt);
mysqli_close($conn);
?>
