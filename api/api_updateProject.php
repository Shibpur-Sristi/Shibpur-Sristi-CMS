<?php
    // Include the database configuration file
    include_once '../includes/db.php';

    if (isset($_POST['submit'])) {
    
        // File upload configuration
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $project_type = $_POST['prj-type'];
        $prj_name = $_POST['prj_name'];
        $prj_date = $_POST['prj_date'];
        // $dateObject = DateTime::createFromFormat('M d, Y', $prj_date);
        // $prj_date = $dateObject->format('Y-m-d');
        $place = $_POST['place'];
        $short_desc = $_POST['short_desc'];
        $short_desc = str_replace("'", "\'", $short_desc);
        $short_desc = str_replace("\"", "\\\"", $short_desc);
        $long_desc = $_POST['long_desc'];
        $long_desc = str_replace("'", "\'", $long_desc);
        $long_desc = str_replace("\"", "\\\"", $long_desc);

        // $basePath = "in db.php";
        
        $projectFolder = $basePath ."/project_gallary/" . $prj_name;
        if (!is_dir($projectFolder)) {
            mkdir($projectFolder, 0755, true); // Recursive directory creation
        }
        
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = $icon = '';
        $fileNames = array_filter($_FILES['files']['name']);
        if (!empty($fileNames)) {
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path
                $thumb_image = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $basePath ."/project_image/". $thumb_image;

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert sql
                        $updateValuesSQL = "`prj_catagory`='" . $project_type . "', `prj_date`='" . $prj_date . "', `place`='" . $place . "', `thumb_image`='" . $thumb_image . "', `short_desc`='" . $short_desc . "', `long_desc`='" . $long_desc . "' WHERE `prj_name`='" . $prj_name . "'";
                    } else {
                        $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                }
            }

            if (!empty($updateValuesSQL)) {
                // Insert image file name into database
                // echo $insertValuesSQL;
                $insert = $conn->query("UPDATE `project_details` SET $updateValuesSQL");
                if ($insert) {
                    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                    $statusMsg = "Files are updated successfully." . $errorMsg;
                    $icon = '<div class="icon"><i class="far fa-check-circle" style="color: #388e3c;"></i></div>';
                } else {
                    $statusMsg = "Sorry, there was an error updating your file.";
                    $icon = '<div class="icon"><i class="far fa-times-circle" style="color: #d32f2f;"></i></div>';
                }
            }
        } else {
            $updateValuesSQL = "`prj_catagory`='" . $project_type . "', `prj_date`='" . $prj_date . "', `place`='" . $place . "', `short_desc`='" . $short_desc . "', `long_desc`='" . $long_desc . "' WHERE `prj_name`='" . $prj_name . "'";
            if (!empty($updateValuesSQL)) {
                // Insert image file name into database
                // echo $insertValuesSQL;
                $insert = $conn->query("UPDATE `project_details` SET $updateValuesSQL");
                if ($insert) {
                    $statusMsg = "Files are updated successfully." . $errorMsg;
                    $icon = '<div class="icon"><i class="far fa-check-circle" style="color: #388e3c;"></i></div>';
                } else {
                    $statusMsg = "Sorry, there was an error updating your file.";
                    $icon = '<div class="icon"><i class="far fa-times-circle" style="color: #d32f2f;"></i></div>';
                }
            }
        }

        // Display status message
        $redirectUrl = "../index.php";

      $html = '
<div class="center">
    ' . $icon . '
    <h5>' . $statusMsg . '</h5>
    <button onclick="window.location.href=\'' . $redirectUrl . '\'" style="
        margin-top: 15px;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    ">
        Go Back
    </button>
</div>';
echo $html;
    }

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
