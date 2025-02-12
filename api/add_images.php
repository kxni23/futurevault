<?php
include('config.php');

$uploadDirectory = __DIR__ . '/uploads/';

if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $memoryType = $_POST['memory-type'];
    $userid = $_SESSION["id"];
    $category = $_POST['cat'];

    $memoryContent = '';

    if ($memoryType === "text") {
        $memoryContent = $_POST['memory'];
    } elseif (in_array($memoryType, ["image", "video", "audio"])) {
        $files = $_FILES['memory'];

        $uploadedFiles = [];
        if (is_array($files['name'])) {
            for ($i = 0; $i < count($files['name']); $i++) {
                if ($files['error'][$i] === UPLOAD_ERR_OK) {
                    $fileName = $files['name'][$i];
                    $fileTmpPath = $files['tmp_name'][$i];
                    $fileDestination = $uploadDirectory . $fileName;

                    if (move_uploaded_file($fileTmpPath, $fileDestination)) {
                        $uploadedFiles[] = $fileName;
                    }
                }
            }
        }
        $memoryContent = implode(', ', $uploadedFiles);
    } else {
        die("Invalid memory type selected.");
    }

    $sql = "INSERT INTO memory (title, description, file, date, userid, category) VALUES(?,?,?,?,?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $title, $description, $memoryContent, $event_date, $userid, $category);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Memory saved successfully!');window.location.href='../page3.php?cat=".$category."';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
