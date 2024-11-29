<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start output buffering
ob_start();

try {
    // Include the database configuration file
    include_once '../includes/db.php';

    if (isset($_POST['submit'])) {
        // File upload configuration
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $project_type = $_POST['prj-type'];
        $prj_name = $_POST['prj_name'];
        $prj_date = $_POST['prj_date'];
        $place = $_POST['place'];
        $short_desc = $_POST['short_desc'];
        $long_desc = $_POST['long_desc'];

        // Sanitize and escape inputs to prevent XSS and SQL injection
        $short_desc = str_replace(["'", "\""], ["\'", "\\\""], $short_desc);
        $long_desc = str_replace(["'", "\""], ["\'", "\\\""], $long_desc);

        // Define the base path and folder
        $basePath = "/home/tkhuygsu/public_html/admin/sristi_page/project_image/";
        $projectFolder = $basePath . $prj_name;

        // Check if folder exists, if not, create it
        if (!is_dir($projectFolder)) {
            mkdir($projectFolder, 0755, true); // Recursive directory creation
        }

        $targetDir = $basePath . $prj_name . "/";
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = $icon = '';
        $fileNames = array_filter($_FILES['files']['name']); // Get all file names

        if (!empty($fileNames)) {
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path
                $thumb_image = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $thumb_image;

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert SQL
                        $insertValuesSQL .= "('".$project_type."','".$prj_name."', '".$prj_date."', '".$place."', '".$thumb_image."', '".$short_desc."', '".$long_desc."')";
                    } else {
                        $errorUpload .= $_FILES['files']['name'][$key].' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['files']['name'][$key].' | ';
                }
            }

            if (!empty($insertValuesSQL)) {
                // Insert image file name into database
                $insert = $conn->query("INSERT INTO `project_details` (`prj_catagory`, `prj_name`, `prj_date`, `place`, `thumb_image`, `short_desc`, `long_desc`) VALUES $insertValuesSQL");
                if ($insert) {
                    $errorUpload = !empty($errorUpload) ? 'Upload Error: '.trim($errorUpload, ' | ') : '';
                    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: '.trim($errorUploadType, ' | ') : '';
                    $errorMsg = !empty($errorUpload) ? '<br/>'.$errorUpload.'<br/>'.$errorUploadType : '<br/>'.$errorUploadType;
                    $statusMsg = "Files are uploaded successfully.".$errorMsg;
                    $icon = '<div class="icon"><i class="far fa-check-circle" style="color: #388e3c;"></i></div>';
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                    $icon = '<div class="icon"><i class="far fa-times-circle" style="color: #d32f2f;"></i></div>';
                }
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }

        // Redirect after 5 seconds using absolute URL
        header("Location: http://cms.shibpursristi.in/".strtolower($project_type).".php");
        exit(); // Ensure no further code is executed after redirect

        // Display status message before redirect
        echo '<div class="center">
                '.$icon.'
                <h5>'.$statusMsg.'</h5>
                <p>Redirecting in <i>5</i> seconds...</p>
            </div>';

    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// End output buffering
ob_end_flush();
?>
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

</body>

</html>
