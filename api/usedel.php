<?php
include('config.php'); // Include database connection


// Check if seller is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'user not logged in']);
    exit;
}

$sellerId = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!isset($data['reason']) || empty($data['reason'])) {
    echo json_encode(['success' => false, 'message' => 'Reason for deletion is required']);
    exit;
}

$reason = $data['reason'];
$comments = isset($data['comments']) ? $data['comments'] : '';

// Log the reason for deletion (Optional - Useful for analytics)
// $logSql = "INSERT INTO seller_deletion_logs (seller_id, reason, comments) VALUES (?, ?, ?)";
// $logStmt = mysqli_prepare($conn, $logSql);
// mysqli_stmt_bind_param($logStmt, "iss", $sellerId, $reason, $comments);
// mysqli_stmt_execute($logStmt);

// Delete seller from the database
$deleteSql = "DELETE FROM persons WHERE user_id = ?";
$deleteStmt = mysqli_prepare($conn, $deleteSql);


if (mysqli_stmt_execute($deleteStmt)) {
    session_destroy(); // Log out the seller
    echo json_encode(['success' => true, 'message' => 'user account deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete user account']);
}

// Close database connections
// mysqli_stmt_close($logStmt);
mysqli_stmt_close($deleteStmt);
mysqli_close($conn);
?>
