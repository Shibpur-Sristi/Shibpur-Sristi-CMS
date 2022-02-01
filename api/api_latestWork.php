<?php

include_once '../includes/db.php';

// END_POINT = /api/api_latestWork.php?limit=3
$limit = $_GET['limit'];

$query = "SELECT * FROM project_details ORDER BY prj_date DESC LIMIT $limit";

$queryResult = $conn->query($query);

$latestWorks = [];
if ($queryResult->num_rows > 0) {
    while ($row = $queryResult->fetch_assoc()) {
        $imageURL = 'https://www.shibpursristi.org/admin/sristi_page/project_image/'.$row["thumb_image"];
        $prj_date = $row["prj_date"];                    
        $prj_name = $row["prj_name"];
        $prj_description = $row["short_desc"];
       

        $project = array(
            "image" => $imageURL,
            "name" => $prj_name,
            "date" => $prj_date,
            "description" => $prj_description            
        );

        array_push($latestWorks, $project);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $latestWorks));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
}
