<?php
include('config.php');

$userid = $_SESSION["id"];
$category = $_GET["cat"];

$sql = "SELECT title, date AS unlockDate, description, file, PersonID FROM memory WHERE userid = '$userid' AND category = '$category'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $memories = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $memories[] = $row;
    }

    if (empty($memories)) {
        echo json_encode(['message' => 'No memories found, add a new memory.']);
    } else {
        echo json_encode($memories);
    }
} else {
    echo json_encode(['error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>
