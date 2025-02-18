<?php 
include('api/config.php');

// Debugging: Check if session ID exists
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    echo "<script>alert('Session expired. Please log in again.'); window.location.href='sellerslogin.php';</script>";
    exit;
}

// Get seller ID securely
$sellerid = intval($_SESSION['id']);

if ($sellerid > 0) {
    // Use prepared statement to prevent SQL injection
    $sql = "SELECT username, email,  password, business_name, website_link,phone FROM sellers WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sellerid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $userInfo = $result->fetch_assoc();

        // Assign values
        $sellername = htmlspecialchars($userInfo['username']);
        $email = htmlspecialchars($userInfo['email']); 
        // $imagename = htmlspecialchars($userInfo['profile_name']);
        // $bio = htmlspecialchars($userInfo['bio']);
        $BusinessName = htmlspecialchars($userInfo['business_name']);
        // $BusinessType = htmlspecialchars($userInfo['business_type']);
        $Website = htmlspecialchars($userInfo['website_link']);
        $phone = htmlspecialchars($userInfo['phone']);

        // $joined = htmlspecialchars($userInfo['joined_date']);
    } else {
        echo "<script>alert('User not found'); window.location.href='loginn.html';</script>";
        exit;
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid user session'); window.location.href='loginn.html';</script>";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download.jpg') no-repeat center center/cover;
            color: rgba(47, 47, 48, 0.8);
            line-height: 1.6;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffffcb;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary { background-color: #559ce7; }
        .btn-primary:hover { background-color: #00419195; }
        .btn-secondary { background-color: #f4f4f4; color: #333; }
        .btn-secondary:hover { background-color: #ddd; }
    </style>
</head>
<body>

<header>
    <h1>Future Vault</h1>
    <p>Preserve Today, Unlock Tomorrow</p>
</header>

<div class="container">
    <div class="profile">
        <p><strong>Seller Name:</strong> <?php echo htmlspecialchars($sellername); ?></p>
        <p><strong>Seller ID:</strong> <?php echo $sellerid; ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>

    <div class="shop-details">
        <h2>Shop Details</h2>
        <p><strong>Business Name:</strong> <?php echo htmlspecialchars($BusinessName); ?></p>
        <p><strong>Website:</strong> <a href="<?php echo htmlspecialchars($Website); ?>" target="_blank"><?php echo htmlspecialchars($Website); ?></a></p>
        <p><strong>Phone:</strong> <?php echo nl2br(htmlspecialchars($phone)); ?></p>
    </div>

    <!-- Edit Form -->
    <button class="btn btn-primary" onclick="showEditForm()">Edit Profile</button>
    <div id="edit-form" class="edit-form" style="display: none;">
        <form action="api/sellerprofile.php" method="POST" enctype='multipart/form-data'> 
            <input type="hidden" name="sellerid" value="<?php echo $sellerid; ?>">

            <label for="sellername">Seller Name</label>
            <input type="text" name="sellername" id="sellername" value="<?php echo htmlspecialchars($sellername); ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="BusinessName">Business Name</label>
            <input type="text" name="BusinessName" id="BusinessName" value="<?php echo htmlspecialchars($BusinessName); ?>">

            <label for="BusinessType">Business Type</label>
            <input type="text" name="BusinessType" id="BusinessType" value="<?php echo htmlspecialchars($BusinessType); ?>">

            <label for="Website">Website</label>
            <input type="text" name="Website" id="Website" value="<?php echo htmlspecialchars($Website); ?>">

            <label for="About">About</label>
            <textarea id="About" name="About" rows="3"><?php echo htmlspecialchars($bio); ?></textarea>

            <label for="image">Profile Image</label>
            <input type="file" id="image" name="image">

            <div class="action-buttons">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
            </div>
        </form>
    </div>

    <div class="account-options">
        <a href="./changepassword.php">Change Password</a>
        <a href="./deleteaccount.php">Delete Account</a>
    </div>
</div>

<script>
function showEditForm() {
    document.getElementById('edit-form').style.display = 'block';
}
function hideEditForm() {
    document.getElementById('edit-form').style.display = 'none';
}
</script>

</body>
</html>
