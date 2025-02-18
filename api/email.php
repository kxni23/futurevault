<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

require 'vendor/autoload.php';
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$sql = "SELECT memory.*, persons.emailID FROM memory 
        JOIN persons ON memory.userid = persons.id 
        WHERE DATE(memory.date) = CURDATE() AND memory.emailstatus = 'not sent'";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kanikakumanan2@gmail.com';  // Use a valid email
        $mail->Password = 'xscl dwsd ornu pebe';  // Use an App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $emailsSent = [];
        while ($userInfo = $result->fetch_assoc()) {
            $mid = $userInfo["PersonID"];  // Assuming "id" is the primary key in memory table
            $title = $userInfo["title"];
            $description = $userInfo["description"];
            $userEmail = $userInfo["useremail"];
            $senderEmail = $userInfo["emailID"];

            $mail->setFrom($senderEmail, 'Dev Up');
            $mail->addAddress($userEmail, 'Surprise');

            // Email Body
            $mail->isHTML(true);
            $mail->Subject = 'You have a special memory waiting to be unlocked—your surprise is just around the corner!';
            $mail->Body = "
                <p><strong>Title:</strong> $title</p>
                <p><strong>Description:</strong> $description</p>
            ";
            $mail->AltBody = "You have a special memory waiting to be unlocked.";

            if ($mail->send()) {
                $emailsSent[] = $mid;
            }
            $mail->clearAddresses();
        }
        if (!empty($emailsSent)) {
            $ids = implode(',', $emailsSent);
            $updateQuery = "UPDATE memory SET emailstatus = 'sent' WHERE PersonID IN ($ids)";
            $conn->query($updateQuery);
        }

        echo json_encode(['status' => 200, 'message' => 'Emails sent successfully']);
    } catch (Exception $e) {
        echo json_encode(['status' => 500, 'message' => "Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(['status' => 404, 'message' => 'No emails to send']);
}

?>