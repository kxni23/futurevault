<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Future Vault</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'ribeye';
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: rgba(178, 204, 238, 0.468);
            line-height: 1.6;
        }

        
        /* Title */
        .title {
            text-align: center;
            font-size: 24px;
            color: #2b2728;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* Grid layout */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 8px 10%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .grid-item {
            text-align: center;
            background-color: rgba(64, 76, 82, 0.69);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 90%;
            text-decoration:none;
        }

        .grid-item img {
            width: 100%;
            height: 300px;
            border-radius: 10px 10px 0 0;
        }

        .grid-item p {
            margin: 10px 0;
            font-size: 18px;
            color:rgb(255, 247, 249);
            font-weight: bold;
        }

        .grid-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Center the 'Others' grid item */
        .grid .others {
            grid-column: 2 / 3;
            justify-self: center;
        }

        /* Footer */
        
    </style>
</head>
<body>
    <!-- Header -->
    
<?php include('header.php') ?>
    <!-- Content -->
    <div class="grid">
        <!-- Family -->
        <a href="page3.php?cat=family" class="grid-item">
            <img src="ff.png" />
            <p>FAMILY</p>
        </a>

        <!-- Partner -->
        <a href="page3.php?cat=partner" class="grid-item">
            <img src="kkkk.jpg" alt=" couple" />
            <p>PARTNER</p>
        </a>

        <!-- Friends -->
        <a href="page3.php?cat=friends" class="grid-item">
            <img src="ffffff.avif" alt="Group of friends" />
            <p>FRIENDS</p>
        </a>

        <!-- Future Self -->
        <a href="page3.php?cat=future_self" class="grid-item">
            <img src="kkk.avif" alt="Person looking to the future" />
            <p>FUTURE SELF</p>
        </a>

        <!-- Travel -->
        <a href="page3.php?cat=travel" class="grid-item">
            <img src="ooo.avif" alt="Scenic travel destination" />
            <p>TRAVEL</p>
        </a>

        <!-- Pets -->
        <a href="page3.php?cat=pets" class="grid-item">
            <img src="ppp.jpg" />
            <p>PETS</p>
        </a>

        <!-- Centered "Others" -->
        <a href="page3.php?cat=others" class="grid-item others">
            <img src="ii.avif" alt="Other memories" />
            <p>OTHERS</p>
        </a>
    </div>

    <!-- Footer -->
   <?php include('footer.php')?>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("profile-menu");
            menu.classList.toggle("show-menu");
        }
    </script>
</body>
</html>
