<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include "config.php";

$RequestMethod = $_SERVER["REQUEST_METHOD"];

// USE THIS WHEN YOU ARE USING JSON method
// $requestData = json_decode(file_get_contents('php://input'), true);

if($RequestMethod == "POST"){
    try {
        if(empty($_REQUEST['username']) || empty($_REQUEST['email']) || empty($_REQUEST['password']) || empty($_REQUEST['confirmpassword'])) {
            throw new Exception("All Fields Required");
        }

        // JSON FORMAT
        // $username = addslashes(trim($requestData['username']));
        // $email = addslashes(trim($requestData['email']));
        // $password = addslashes(trim($requestData['password']));
        // $confirmpassword = addslashes(trim($requestData['confirmpassword']));

        // REQUEST METHOD FORMAT
        $username	= addslashes((trim($_REQUEST['username'])));
        $email	    = addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));
        $confirmpassword	= addslashes((trim($_REQUEST['confirmpassword'])));

        // Check if username or email already exists
        $checkQuery = "SELECT COUNT(*) AS count FROM signup WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $checkQuery);
        $row = mysqli_fetch_assoc($result);

        if($row['count'] > 0) {
            throw new Exception("Username or email already exists. Please choose another.");
        }

        $InsertArray = array();
        $InsertArray["username"] = $username;
        $InsertArray["email"] = $email;
        $InsertArray["password"] = $password;
        $InsertArray["confirmpassword"] = $confirmpassword;
        
        $columns = implode(", ",array_keys($InsertArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        $values  = implode("', '", $escaped_values);
        
        $AddNewUserQuery = "INSERT INTO signup ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));

        $Data = [
            'status' => 200,
            'message' => 'Registration Success'
        ];

        header("HTTP/1.0 200 Success");
        echo json_encode($Data);

    } catch (Exception $ex) {
        $Data = [
            'status' => 500,
            'message' => $ex->getMessage()
        ];
    
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($Data);
    }
}else{
    $Data = [
        'status' => 405,
        'message' => $RequestMethod . ' Method Not Allowed'
    ];

    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($Data);
}

?>
