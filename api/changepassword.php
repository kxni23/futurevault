<?php  
include('config.php');

// Validate if user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['id'];
$data = json_decode(file_get_contents('php://input'), true);

// Fetch the current password, new password, and confirm password from the request
$currentPassword = $data['currentPassword'];
$newPassword = $data['newPassword'];

// Get the user's stored password from the database (use the correct table, e.g., 'users' or 'persons')
$sql = "SELECT password FROM persons WHERE id = '$userId'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo json_encode(['success' => false, 'message' => 'User not found']);
    exit;
}

$user = mysqli_fetch_assoc($result);

// Verify the current password with the stored password
// if (!password_verify($currentPassword, $user['password'])) {
//     echo json_encode(['success' => false, 'message' => 'Current password is incorrect']);
//     exit;
// }

// Validate the new password (check for minimum length, uppercase, special character, etc.)
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newPassword)) {
    echo json_encode(['success' => false, 'message' => 'Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a number, and a special character.']);
    exit;
}

// If the new password matches the old one, don't allow the change
if ($newPassword === $currentPassword) {
    echo json_encode(['success' => false, 'message' => 'New password cannot be the same as the current password.']);
    exit;
}



// Update the password in the database
$updateSql = "UPDATE persons SET password = '$newPassword' WHERE id = '$userId'";
if (mysqli_query($conn, $updateSql)) {
    // Password updated successfully
    echo json_encode(['success' => true, 'message' => 'Password updated successfully']);
} else {
    // Error in updating password
    echo json_encode(['success' => false, 'message' => 'An error occurred while updating the password']);
}

// Close the database connection
mysqli_close($conn);
?>
