<?php
header('Content-Type: application/json');

// Include database connection
include '../includes/db.php';

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Debugging: Log the incoming data for inspection
file_put_contents('debug_log.txt', print_r($data, true), FILE_APPEND);

// Ensure that the required key 'id' is present in the input data
if (array_key_exists('id', $data)) {
    // Get the 'id' (here, 'prj_name' is treated as id)
    $id = $conn->real_escape_string($data['id']);
    
    // We now hardcode the update query based on other fields:
    $prj_catagory = isset($data['prj_catagory']) ? $conn->real_escape_string($data['prj_catagory']) : '';
    $prj_name = isset($data['prj_name']) ? $conn->real_escape_string($data['prj_name']) : '';
    $prj_date = isset($data['prj_date']) ? $conn->real_escape_string($data['prj_date']) : '';
    $place = isset($data['place']) ? $conn->real_escape_string($data['place']) : '';
    $short_desc = isset($data['short_desc']) ? $conn->real_escape_string($data['short_desc']) : '';
    $long_desc = isset($data['long_desc']) ? $conn->real_escape_string($data['long_desc']) : '';

    // Constructing the update query directly with the values from the input
    $query = "UPDATE project_details SET 
              prj_catagory = '$prj_catagory',
              prj_name = '$prj_name',
              prj_date = '$prj_date',
              place = '$place',
              short_desc = '$short_desc',
              long_desc = '$long_desc'
              WHERE prj_name = '$id'"; // Use prj_name as the id to find the record

    // Execute the query directly
    if ($conn->query($query) === TRUE) {
        echo json_encode(["statusCode" => 200, "message" => "Record updated successfully"]);
    } else {
        echo json_encode(["statusCode" => 500, "message" => "Error executing the query: " . $conn->error]);
    }
} else {
    echo json_encode(["statusCode" => 400, "message" => "Missing 'id' parameter in input"]);
}

// Close the database connection
$conn->close();
?>
