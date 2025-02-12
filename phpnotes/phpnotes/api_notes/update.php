<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include "config.php";

try {

    // USE THIS WHEN YOU ARE USING JSON method
    // $requestData = json_decode(file_get_contents('php://input'), true);

    // Request method
    $RequestMethod = $_SERVER["REQUEST_METHOD"];

    if ($RequestMethod !== "POST") {
        throw new Exception('Method Not Allowed', 405);
    }

    // Validate and extract required parameters
    if (!isset($_REQUEST['id']) || !isset($_REQUEST['status'])) {
        throw new Exception('Invalid input: Missing required fields (id or status)', 400);
    }

    // JSON Method FORMAT
    // $user_id = strtolower(addslashes((trim($requestData['id']))));
    // $status = strtolower(addslashes((trim($requestData['status']))));

    // REQUEST METHOD FORMAT
    $user_id = strtolower(addslashes((trim($_REQUEST['id']))));
    $status = strtolower(addslashes((trim($_REQUEST['status']))));

    // Update the user status in the database
    $UpdateUserQuery = "UPDATE userdetails SET admin_status = ? WHERE id = ?";
    $stmt = $conn->prepare($UpdateUserQuery);
    $stmt->bind_param("ss", $status, $user_id);

    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            $Data = [
                'status' => 200,
                'message' => 'User status updated successfully'
            ];
            echo json_encode($Data);
        } else {
            throw new Exception('status unchanged', 404);
        }
        
    } else {
        throw new Exception('Failed to update user status', 500);
    }
} catch (Exception $e) {
    $status = $e->getCode() ?: 500; // Default to 500 if no code is set
    $message = $e->getMessage();

    // Log the error for debugging (optional)
    error_log("Error [Status: $status]: $message");

    // Respond with error details
    $Data = [
        'status' => $status,
        'message' => $message
    ];
    header("HTTP/1.0 $status " . getStatusCodeMessage($status));
    echo json_encode($Data);
}

function getStatusCodeMessage($status)
{
    $codes = [
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'User not found or Status unchanged',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error'
    ];
    return $codes[$status] ?? 'Unknown Status';
}