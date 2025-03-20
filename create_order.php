<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require('razorpay-php/Razorpay.php'); // Include Razorpay SDK

use Razorpay\Api\Api;

$keyId = "rzp_test_HtR6S086wRXLnD"; // Replace with your API Key
$keySecret = "5TNsEOQB4YQjdDeI5wvzwJp5"; // Replace with your Secret Key

$api = new Api($keyId, $keySecret);

$input = json_decode(file_get_contents("php://input"), true);
$amount = $input['amount'];

$order = $api->order->create([
    'receipt' => 'order_' . time(),
    'amount' => $amount,
    'currency' => 'INR',
    'payment_capture' => 1
]);

echo json_encode(['order_id' => $order['id'], 'amount' => $amount]);
?>
