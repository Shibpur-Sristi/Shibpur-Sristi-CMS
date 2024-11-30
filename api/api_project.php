<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '../includes/db.php';

header('Content-Type: application/json; charset=utf-8');
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    echo json_encode(array("statusCode" => 500, "msg" => "Database connection failed: " . $conn->connect_error));
    exit;
}

if (isset($_GET['project']) && !empty($_GET['project'])) {
    $PRJ = trim($_GET['project']);

    $query = "SELECT * FROM project_details WHERE prj_name = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        echo json_encode(array("statusCode" => 500, "msg" => "Query preparation failed: " . $conn->error));
        exit;
    }

    $stmt->bind_param("s", $PRJ);
    $stmt->execute();
    $result = $stmt->get_result();

    $projects = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageURL = $base_image_url . $row["thumb_image"]; //$base_image_url in db.php
            $projects[] = array(
                "type" => $row["prj_catagory"],
                "image" => $imageURL,
                "name" => $row["prj_name"],
                "date" => $row["prj_date"],
                "location" => $row["place"],
                "description" => $row["short_desc"],
                "details" => $row["long_desc"],
            );
        }

        echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $projects));
    } else {
        echo json_encode(array("statusCode" => 201, "msg" => "No Data Found", "data" => []));
    }

    $stmt->close();
} else {
    echo json_encode(array("statusCode" => 400, "msg" => "Project parameter missing or invalid"));
}

$conn->close();
?>
