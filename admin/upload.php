
<?php

    $filesDir = "images/";
    $file = $filesDir . basename($_FILES["fileToUpload"]["name"]);
    $fileExtension = pathinfo($file,PATHINFO_EXTENSION);
    $okToUpload = true;

    // Checks if file is a an image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check !== false) {
            $okToUpload = true;
        } else {
            echo "File is not an image.";
            $okToUpload = false;
        }
    }

    // Checks if file is in specified format
    if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg" && $fileExtension != "gif" ) {
        echo "Incorrect File Format";
        $okToUpload = false;
    }

    // Checks if file can be uploaded
    if ($okToUpload == false) {
        echo "File was not uploaded.";

        // if file is ok to be uploaded
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Uploading error, try again";
        }
    }

?>
