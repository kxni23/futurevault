<?php

include('config.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    $sql = "SELECT * FROM persons WHERE username = '$username' AND password = '$password'";
    
    // Execute the query
    $result = $conn->query($sql);

    // Check if a user with the given credentials exists
    if ($result->num_rows == 1) {
        // User is authenticated, set session variable to indicate login
        $_SESSION["logged_in"] = true;
        $userInfo = $result->fetch_assoc();
        $_SESSION["id"] = $userInfo["id"];
        $usertype = $userInfo["usertype"]; 
        $_SESSION["username"] = $userInfo["username"];
        // Redirect to a protected page based on the user role
        if ($usertype == "1") {
            // header("Location: homepage.html");
            echo "<script type='text/javascript'>alert('Login Successfully');window.location.href='../homepage.php';</script>";

            exit();
        } elseif ($usertype == "2") {
            header("Location: home1.php");
            exit();
        } elseif ($usertype == "3") {
            
            header("Location: hospital.php");
            exit();
        } else {
            echo "Unknown role: $usertype"; // Fix: Use $usertype instead of $role
        }
    } else {
        // Invalid credentials, show an error message
        echo "<script type='text/javascript'>alert('Invalid Username and Password');window.location.href='sellerlogin.php';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>