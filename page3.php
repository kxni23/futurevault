<?php 
include('api/config.php');
?>
<?php 
$cat = $_GET['cat'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widt-h=device-width, initial-scale=1.0">
    <title>My Memories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            line-height: 1.6;
            color: #4a4a4a; 
        }

       

        .container {
            width: 90%;
           max-width: 800px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.77);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            text-align: center;
        }

        .memory-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            width: 96%;
        }

        .memory-form input, .memory-form textarea, .memory-form select, .memory-form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .memory-form button {
            background-color: rgb(45, 125, 190);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .memory-form button:hover {
            background-color: #3a84c8;
        }

        .memory-list {
            margin-top: 20px;
        }

        .memory-item {
            background-color: rgba(249, 249, 249, 0.82);
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .memory-item h3 {
            font-size: 20px;
            color: #333;
        }

        .memory-item p {
            font-size: 16px;
            color: #555;
        }

        .memory-item img, .memory-item video, .memory-item audio {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        .memory-item button {
            background-color: #f15b40;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
        }

        .memory-item button:hover {
            background-color: #cc4c36;
        }

        .no-memories {
            text-align: center;
            font-size: 16px;
            color: #666;
        }

        .unlock-date {
            font-size: 14px;
            color: #555;
        }

        .locked {
            color: #888;
        }
        .footer{
            position: relative;
            bottom:0;
            top:75px;

            
        }
    </style>
</head>
<body>
<?php include('header.php') ?>
<!-- Main Content Section -->
<div class="container">
    <h1>My Memories</h1>
    <form id="memoryForm" action="api/add_images.php" method="POST" enctype="multipart/form-data">
        <div class="memory-form">
            <input type="hidden" name="cat" value="<?php echo $cat; ?>">
            <input type="text" name="title" id="memory-title" placeholder="Memory Title" required>
            <textarea id="memory-description" name="description" placeholder="Describe your memory here..." rows="5" required></textarea>
            <select id="memory-type" name="memory-type" required onchange="toggleMemoryTypeField()">
                <option value="">Select Memory Type</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
                <option value="audio">Audio</option>
            </select>
            
            <!-- Text area for text memory input -->
            <textarea id="text-memory" name="memory" placeholder="Write your memory here..." rows="5" style="display: none;"></textarea>
            
            <!-- File input for multiple files -->
            <input type="file" id="memory-file" name="memory[]" accept="image/*,video/*,audio/*" style="display: none;" multiple required>
            
            <input type="date" name="event_date" id="unlock-date" required>
            
            <button type="submit">Save Memory</button>
        </div>
    </form>

    <div class="memory-list" id="memory-list">
        <!-- Dynamically added memories will appear here -->
    </div>
</div>

<script>
    function toggleMemoryTypeField() {
        const memoryType = document.getElementById("memory-type").value;
        const textMemoryField = document.getElementById("text-memory");
        const fileInputField = document.getElementById("memory-file");

        if (memoryType === "text") {
            textMemoryField.style.display = "block";
            fileInputField.style.display = "none";
        } else {
            textMemoryField.style.display = "none";
            fileInputField.style.display = "block";
        }
    }
</script>




<?php include('footer.php') ?>

</body>
</html>
