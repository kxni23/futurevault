<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include "config.php";

$RequestMethod = $_SERVER["REQUEST_METHOD"];

if($RequestMethod == "POST"){
    try {
       
        $Query      = "SELECT * FROM tablename";

        $Results    = mysqli_query($conn,$Query);
        $ListArray  = array();

        if($Results){
            if (mysqli_num_rows($Results) > 0) 
            {
                while($record = mysqli_fetch_assoc($Results)) 
                {
                    $data = array();
                    $data["id"]             = $record["id"];
                    $data["category"]       = $record["category"];
                    $data["brand"]          = $record["brand"];
                    $data["image_name"]     = UPLOAD_URL . $record["image_name"];
                    $data["parts"]          = $record["parts"];
                    $data["product_name"]   = $record["product_name"];
                    
                    array_push($ListArray,$data);

                }

                $Data =[
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $ListArray,
                ];
            
                header("HTTP/1.0 200 Success");
                echo json_encode($Data);
            }else{
                $Data =[
                    'status' => 404,
                    'message' => 'No Course Found'
                ];
            
                header("HTTP/1.0 404 No Course Found");
                echo json_encode($Data);
            }

        }else{
            $Data =[
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
        
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($Data);
        }

    } catch (Exception $ex) {
        $Data =[
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
    
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($Data);
    }
}else{
    $Data =[
        'status' => 405,
        'message' => $RequestMethod . ' Method Not Allowed'
    ];

    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($Data);
}

?>