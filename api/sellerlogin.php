<?php
// session_start(); // Start the session
include('config.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username and Password cannot be empty!'); window.history.back();</script>";
        exit;
    }

    // Secure SQL query using prepared statements
    $sql = "SELECT id, username, password FROM sellers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $userInfo = $result->fetch_assoc();
        
        // Check password directly (NOT SECURE)
        if ($password === $userInfo["password"]) {
            $_SESSION["logged_in"] = true;
            $_SESSION["id"] = $userInfo["id"];
            $_SESSION["username"] = $userInfo["username"];

            // Redirect to seller dashboard
            echo "<script>alert('Login Successfully'); window.location.href='../sellerdashboard.php';</script>";
            exit;
        } else {
            echo "<script>alert('Invalid Username or Password!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid Username or Password!'); window.history.back();</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
