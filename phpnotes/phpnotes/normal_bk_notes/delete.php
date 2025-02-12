<?php

    include('config.php');

    $orderId = $_GET['orderId'];

    $update_query = "DELETE FROM orders WHERE id = $orderId";

    if ($conn->query($update_query) === TRUE) {
        echo "<script type='text/javascript'>alert('Successfully');window.location.href='#';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error');window.location.href='#';</script>";
    }

    $conn->close();

?>

