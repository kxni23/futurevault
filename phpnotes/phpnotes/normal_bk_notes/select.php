<?php
include('config.php');

$parts = $_GET['parts'];

$query = "SELECT * FROM overall where parts ='$parts'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $image_data = $row['image_data'];
        $product_name = $row['product_name'];
        $id = $row['id'];


        echo '<div class="col-md-4 col-sm-6">';
        echo      '<div class="card mb-30"><a class="card-img-tiles" href="btyrecom.php?id=' . $id . '" data-abc="true">';
        echo          '<div class="inner">';
        echo           '<div class="main-img"><img style="height:200px;" src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="Category"></div>
                  </div></a>';
        echo       '<div class="card-body text-center">';
        echo         '<h4 class="card-title">' . $product_name . '</h4>';
        echo          ' <a class="btn btn-outline-primary btn-sm" style="background-color: #F7C910; color:black; width:100%;" href="addtocart.php?id=' . $id . '" data-abc="true">Add to card</a>';
        echo     '</div>';
        echo   '</div>';
        echo '</div>';
    }
} else {
    echo 'No images found in the table.';
}


$conn->close();
