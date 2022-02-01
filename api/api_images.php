<?php

include_once '../includes/db.php';

// END_POINT = /api/api_images.php?project=Paridhan%2014.0

$prj_name = $_GET['project'];
$query = "SELECT * FROM image_db WHERE prj_name = '$prj_name'";

$queryResult = $conn->query($query);

$images = [];
if ($queryResult->num_rows > 0) {
    while ($row = $queryResult->fetch_assoc()) {
        $imageURL = 'https://www.shibpursristi.org/admin/sristi_page/uploads/' . $row["img"];
    

        $image = array(
        "url" => $imageURL
    );

        array_push($images, $image);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $images));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
}
