<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- CDN Links & JS -->
    <script src="../js/materialize.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <title>Dashboard | Shibpur Sristi</title>
</head>

<body>
    <?php

    include_once '../includes/db.php';

    // END_POINT = /api/api_paridhan.php?project=paridhan
    $project = $_GET['project'];
    $project_type = $_GET['type'];
    $query = "DELETE FROM project_details WHERE prj_name='$project'";


    $queryResult = $conn->query($query);
    $statusMsg = $icon = $errorMsg = '';
    if ($queryResult) {
        // echo json_encode(array("statusCode" => 200, "msg" => "Project Deleted"));
        $statusMsg = "Files are Deleted successfully.".$errorMsg;
        $icon = '<div class="icon"><i class="far fa-check-circle" style="color: #388e3c;"></i></div>';
    } else {
        // echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
        $statusMsg = "Sorry, there was an error deleting your file.";
        $icon = '<div class="icon"><i class="far fa-times-circle" style="color: #d32f2f;"></i></div>';
    }

    // Display status message
    $html = '<div class="center">
                '.$icon.'
                <h5>'.$statusMsg.'</h5>
                <p>redirecting in 5<i>seconds...</i></p>
            </div>';
    echo $html;
    header("refresh:4;url=../".strtolower($project_type).".php");
    ?>
</body>

</html>