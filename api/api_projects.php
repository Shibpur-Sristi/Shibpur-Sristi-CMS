<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database configuration
include_once '../includes/db.php';

// Set the content type to JSON and ensure UTF-8 encoding
header('Content-Type: application/json; charset=utf-8');

// Ensure the connection uses UTF-8 encoding
$conn->set_charset("utf8mb4");

// Check if the 'project' parameter is set
$PRJ_CATAGORY = isset($_GET['project']) ? $_GET['project'] : '';

// Initialize the query
$query = "SELECT * FROM project_details ORDER BY STR_TO_DATE(prj_date, '%Y%m%d') DESC";

// Modify query if project category is provided
if ($PRJ_CATAGORY) {
    $query = "SELECT * FROM project_details WHERE prj_catagory = ? ORDER BY STR_TO_DATE(prj_date, '%Y%m%d') DESC";
}

// Prepare and execute the query using prepared statements
$stmt = $conn->prepare($query);

// Bind the parameters if category is provided
if ($PRJ_CATAGORY) {
    $stmt->bind_param("s", $PRJ_CATAGORY); // "s" means string
}

// Execute the statement
$stmt->execute();

// Get the result
$queryResult = $stmt->get_result();

// Prepare the projects array
$projects = [];

// If query returns results
if ($queryResult->num_rows > 0) {
    // Fetch each row and prepare the project data
    while ($row = $queryResult->fetch_assoc()) {
        // $dateObject = DateTime::createFromFormat('Y-m-d', $row["prj_date"]);
        // $prj_date = $dateObject->format('M d, Y');
        // $place = $row["place"];
        // You can directly use the data without utf8_encode
        $prj_name = $row["prj_name"];
        $place = $row["place"];
        $long_desc = $row["long_desc"];
        $short_desc = $row["short_desc"];
        
        $imageURL = $base_image_url . $row["thumb_image"];
        $prj_date = $row["prj_date"];
        $prj_type = $row["prj_catagory"];

        // Create the project array
        $project = array(
            "type" => $prj_type,
            "image" => $imageURL,
            "name" => $prj_name,
            "date" => $prj_date,
            "location" => $place,
            "description" => $short_desc,
            "details" => $long_desc
        );

        // Push the project data into the projects array
        array_push($projects, $project);
    }

    // Return the data as JSON
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $projects), JSON_UNESCAPED_UNICODE);
} else {
    // If no projects found
    echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
}

// Close the statement
$stmt->close();

// Check for JSON encoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(array("statusCode" => 500, "msg" => "JSON Encoding Error: " . json_last_error_msg()));
}
?>
