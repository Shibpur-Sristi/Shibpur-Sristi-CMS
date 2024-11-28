<?php

include_once '../includes/db.php';

// END_POINT = /api/api_paridhan.php?project=paridhan

$PRJ_CATAGORY = $_GET['project'];

if ($PRJ_CATAGORY) {
    $query = "SELECT * FROM project_details where prj_catagory='$PRJ_CATAGORY' ORDER BY STR_TO_DATE(prj_date, '%Y%m%d') DESC";
} else {
    $query = "SELECT * FROM project_details ORDER BY STR_TO_DATE(prj_date, '%Y%m%d') DESC";
}

$queryResult = $conn->query($query);

$projects = [];
if ($queryResult->num_rows > 0) {
    while ($row = $queryResult->fetch_assoc()) {
        $imageURL = 'https://www.shibpursristi.org/admin/sristi_page/project_image/' . $row["thumb_image"];
        $dateObject = DateTime::createFromFormat('Y-m-d', $row["prj_date"]);
        $prj_date = $dateObject->format('M d, Y');
        $place = $row["place"];
        $prj_name = $row["prj_name"];
        $prj_type = $row["prj_catagory"];
        $long_desc = $row["long_desc"];
        $short_desc = $row["short_desc"];

        $project = array(
            "type" => $prj_type,
            "image" => $imageURL,
            "name" => $prj_name,
            "date" => $prj_date,
            "location" => $place,
            "description" => $short_desc,
            "details" => $long_desc
        );

        array_push($projects, $project);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $projects));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
}
?>