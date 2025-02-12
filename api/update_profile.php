<?php

    include('config.php');

    // Set the directory to save uploaded files
    $uploadDirectory = __DIR__ . '/profile_image/'; // Assuming a directory named 'uploads' in the same directory as this script

    // Check if the directory exists, and create it if it doesn't
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $userid =  $_SESSION["id"];

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $image_name = $_FILES['image']['name'];

    $update_query = "UPDATE persons SET username = '$fullname', emailID = '$email', bio = '$bio', profile_name = '$image_name' WHERE id = $userid";

    if ($conn->query($update_query) === TRUE) {
        $uploadedFilePath = $uploadDirectory . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath);


        echo "<script type='text/javascript'>alert('Successfully');window.location.href='../profifepage.php';</script>";
    }else {
        echo "<script type='text/javascript'>alert('Error');window.location.href='../profifepage.php';</script>";
    }

    $conn->close();

?>

