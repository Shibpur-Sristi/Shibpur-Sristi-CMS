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
if (isset($_POST['submit'])) {
    // Include the database configuration file
    include_once '../includes/db.php';
     
    // File upload configuration
    
    $allowTypes = array('jpg','png','jpeg','gif');
    $prj_catagory = $_POST['project-type'];
    $prj_name = $_POST['project'];
    $targetDir = "../project-image/".$prj_name."/";
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = $icon = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key=>$val) {
            // File upload path
            //$fileName = basename($_FILES['files']['name'][$key]);
            $img = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $img;
             
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql
                    $insertValuesSQL .= "('".$prj_catagory."','".$prj_name."','".$img."'),";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key].' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key].' | ';
            }
        }
         
        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database

            $insert = $conn->query("INSERT INTO image_db (prj_catagory, prj_name, img) VALUES $insertValuesSQL");
            if ($insert) {
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
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
    // Display status message
    $html = '<div class="center">
                '.$icon.'
                <h5>'.$statusMsg.'</h5>
                <p>redirecting in 5<i>seconds...</i></p>
            </div>';
    echo $html;
    header("refresh:5;url=../index.php");
}
?>
</body>

</html>