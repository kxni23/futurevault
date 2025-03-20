<?php 
include('api/config.php');

// Debugging: Check if session ID exists
if (!isset($_SESSION['seller_id']) || empty($_SESSION['seller_id'])) {
    echo "<script>alert('Session expired. Please log in again.'); window.location.href='sellerslogin.php';</script>";
    exit;
}

    $sellerid = $_SESSION['seller_id'];
    

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT username, email,  password, business_name, website_link,phone FROM sellers WHERE seller_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sellerid);
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
        echo "<script>alert('User not found'); window.location.href='sellerslogin.php';</script>";
        exit;
    }

    $stmt->close();


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Vault - Seller Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #559ce7;
        }

        .profile h2 {
            margin: 10px 0;
            color: #222;
        }

        .shop-details {
            margin-top: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
        }

        .btn {
            padding: 12px 20px;
            font-size: 1em;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #559ce7;
            color: white;
        }
        .btn-primary:hover {
            background-color: #004191;
        }

        .edit-form {
            display: none;
            margin-top: 20px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .action-buttons {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }

        .account-options a {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .account-options a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
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

    <button class="btn btn-primary" onclick="showEditForm()">Edit Profile</button>
    <div id="edit-form" class="edit-form">
        <form action="api/sellerprofile.php" method="POST" enctype='multipart/form-data'> 
            <input type="hidden" name="sellerid" value="<?php echo $sellerid; ?>">

            <label for="sellername">Seller Name</label>
            <input type="text" name="sellername" id="sellername" value="<?php echo htmlspecialchars($sellername); ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="BusinessName">Business Name</label>
            <input type="text" name="BusinessName" id="BusinessName" value="<?php echo htmlspecialchars($BusinessName); ?>">

            <label for="Website">Website</label>
            <input type="text" name="Website" id="Website" value="<?php echo htmlspecialchars($Website); ?>">

            <!-- <label for="About">About</label>
            <textarea id="About" name="About" rows="3"><?php echo htmlspecialchars($bio); ?></textarea> -->

            <label for="image">Profile Image</label>
            <input type="file" id="image" name="image">

            <div class="action-buttons">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
            </div>
        </form>
    </div>

    <div class="account-options">
        <a href="./selchangepass.php">Change Password</a>
        <a href="./seldeleteacc.php">Delete Account</a>
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
