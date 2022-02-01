<?php

include_once '../includes/db.php';

// END_POINT = /api/api_gallery.php

$query = "SELECT * FROM image_db ORDER BY author DESC";

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
?>