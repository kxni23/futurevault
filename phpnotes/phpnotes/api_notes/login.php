<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include "config.php"; // Include your database connection configuration


$RequestMethod = $_SERVER["REQUEST_METHOD"];

// USE THIS WHEN YOU ARE USING JSON method
// $requestData = json_decode(file_get_contents('php://input'), true);

if ($RequestMethod == "POST") {

    // JSON FORMAT
    // $email = strtolower(addslashes((trim($requestData['email']))));
    // $password = addslashes((trim($requestData['password'])));
    // $platform  	= addslashes((trim($requestData['platform'])));

    // REQUEST METHOD FORMAT
    $email = strtolower(addslashes((trim($_REQUEST['email']))));
    $password = addslashes((trim($_REQUEST['password'])));
    $platform  	= "web";


    // Check if a regular user with the given credentials exists
    $user_sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
    $user_result = mysqli_query($conn, $user_sql);

    if (mysqli_num_rows($user_result) == 1) {
        $userInfo = mysqli_fetch_assoc($user_result);
        // For web platform, set session variables
        if ($platform == "web") {
          
            $_SESSION["user_logged_in"] = true;
            $_SESSION["username"] = $userInfo["username"];
            $_SESSION["user_id"] = $userInfo["id"];
            $_SESSION["id"] = $userInfo["id"];
            $_SESSION["user_type"] = "regular";

            $Data = [
                'status' => 200,
                'message' => 'User Login Successfully.',
                'redirect' => 'sparehome.php',
                'user' => 'users',
            ];
            header("HTTP/1.0 200 Success");
            echo json_encode($Data);
            exit();
        }else{
            $Data = [
                'status' => 200,
                'message' => 'User Login Successfully.',
                'username' => $userInfo["username"],
                'user_id' => $userInfo["id"],
                'id' => $userInfo['id'],
                'user_type' => 'regular'
            ];
            header("HTTP/1.0 200 Success");
            echo json_encode($Data);
            exit();
        }     
    } else {
        $Data = [
            'status' => 404,
            'message' => 'Invalid Email and Password.',
            'redirect' => 'login.html',
        ];
        header("HTTP/1.0 404 Incorrect Username or Password");
        echo json_encode($Data);
        exit();
    }
} else {
    $Data = [
        'status' => 405,
        'message' => $RequestMethod . ' Method Not Allowed'
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($Data);
    exit();
}
?>
