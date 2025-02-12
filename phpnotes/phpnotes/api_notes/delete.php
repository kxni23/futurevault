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
    if (!isset($_REQUEST['id'])) {
        throw new Exception('Invalid input: Missing required fields (id)', 400);
    }

    // JSON Method FORMAT
    // $user_id = strtolower(addslashes((trim($requestData['id']))));

    // REQUEST METHOD FORMAT
    $user_id = strtolower(addslashes((trim($_REQUEST['id']))));


    // Delete the user status in the database
    $DeleteUserQuery = "DELETE FROM TABLENAME WHERE id = ?";
    $stmt = $conn->prepare($DeleteUserQuery);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            $Data = [
                'status' => 200,
                'message' => 'Success'
            ];
            echo json_encode($Data);
        } else {
            throw new Exception('User not found or status unchanged', 404);
        }
    } else {
        throw new Exception('Failed to Delete User', 500);
    }
} catch (Exception $e) {
    $status = $e->getCode() ? $e->getCode() : 500;
    $message = $e->getMessage();

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
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error'
    ];
    return isset($codes[$status]) ? $codes[$status] : 'Unknown Status';
}
