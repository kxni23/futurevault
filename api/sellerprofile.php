<?php

    include('config.php');

    // Set the directory to save uploaded files
    $uploadDirectory = __DIR__ . '/profile_image/'; // Assuming a directory named 'uploads' in the same directory as this script

    // Check if the directory exists, and create it if it doesn't
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $userid =  $_SESSION["id"];
    $SellerName = $_POST['SellerName'];
    $Sellerid = $_POST['Sellerid'];
    $Email = $_POST['Email'];
    $Joined = $_POST['Joined'];
    $Businessname = $_POST['Businessname'];
    $BusinessType = $_POST['BusinessType'];
    $Website = $_POST['Website'];
    $About= $_POST['About'];
    $image_name = $_FILES['image']['name'];

    $update_query = "UPDATE sellers SET SellerName  = '$SellerName',Sellerid  = '$Sellerid', Email = '$Email', Joined = '$Joined',Businessname ='$Businessname', BusinessType='$BusinessType', Website= '$Website',About='$About' WHERE id = $userid";

    if ($conn->query($update_query) === TRUE) {
        $uploadedFilePath = $uploadDirectory . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath);


        echo "<script type='text/javascript'>alert('Successfully');window.location.href='../slleracc.php';</script>";
    }else {
        echo "<script type='text/javascript'>alert('Error');window.location.href='../selleracc.php';</script>";
    }

    $conn->close();

?>

