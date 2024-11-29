<?php
include_once '../includes/db.php';

// Ensure database connection is established
if ($conn->connect_error) {
    echo json_encode(array("statusCode" => 500, "msg" => "Database connection failed: " . $conn->connect_error));
    exit;
}

// Ensure 'project' parameter is passed in the GET request
if (isset($_GET['project']) && !empty($_GET['project'])) {
    $PRJ = $_GET['project'];

    // Use prepared statement to avoid SQL injection
    $query = "SELECT * FROM project_details WHERE prj_name = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        echo json_encode(array("statusCode" => 500, "msg" => "Database query preparation failed"));
        exit;
    }

    $stmt->bind_param("s", $PRJ); // "s" means the parameter is a string
    $stmt->execute();
    $result = $stmt->get_result();

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
    $projects = [];

    if ($result->num_rows > 0) {
        // Fetch all rows
        while ($row = $result->fetch_assoc()) {
            $imageURL = 'https://www.shibpursristi.in/admin/sristi_page/project_image/' . $row["thumb_image"];
            $prj_date = $row["prj_date"];
            $place = $row["place"];
            $prj_name = $row["prj_name"];
            $prj_type = $row["prj_catagory"];
            $long_desc = $row["long_desc"];
            $short_desc = $row["short_desc"];

            // Construct project data
            $project = array(
                "type" => $prj_type,
                "image" => $imageURL,
                "name" => $prj_name,
                "date" => $prj_date,
                "location" => $place,
                "description" => $short_desc,
                "details" => $long_desc
            );

            // Add project to the projects array
            array_push($projects, $project);
        }

        // Return success response with project data
        echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $projects));
    } else {
        // Return response when no data is found
        echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Return error response if 'project' is not provided in the GET request
    echo json_encode(array("statusCode" => 400, "msg" => "Project parameter missing or invalid"));
}

// Close database connection
$conn->close();
?>
