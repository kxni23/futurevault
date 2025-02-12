<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  

    $phonenumber = $_POST['phonenumber'];

    $emailID = $_POST['emailID'];

    $username = $_POST['username'];

    $password = $_POST['password'];


    $sql = "INSERT INTO persons (phonenumber,emailID,username,password, usertype) VALUES(?, ?, ?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss',$phonenumber, $emailID, $username, $password);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Success');window.location.href='../loginn.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
