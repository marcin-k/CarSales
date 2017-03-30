<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 24/03/2017
 * Time: 20:50
 */
$idWasUpdated=false;
$newImageWasProvided=false;

//checks if the id was updated
if($_POST['oldID']!=$_POST['id']){
    $idWasUpdated=true;
}

//checks if the file was entered
if($_FILES["fileToUpload"]["error"] == 0){
    $newImageWasProvided=true;
}

/*************************************************************************************
 * Below logic determines action to apply based on following:
 * id ID was updated:
 *  - and picture was provided - delete picture with name $oldID and upload new one with name $id
 *  - and picture was not provided - rename the file with name $oldID to $id
 * if ID was not updated:
 *  - and picture was provided - upload image (override existing one)
 *  - and image was not provided - do nothing (not code used)
 *************************************************************************************/

//id ID was updated and picture was provided
if(($idWasUpdated)&&($newImageWasProvided)){
    //deletes old file
    $path = '../app/img/'.$_POST['oldID'].'.jpg';
    if (unlink($path)) {
        echo 'Old car image was deleted successfully';
    } else {
        echo 'Error - could not delete old car image';
    }

    uploadImage($_POST['id']);
}

//id ID was updated and picture was not provided
elseif(($idWasUpdated)&&(!$newImageWasProvided)){
    $oldName ='../app/img/'.$_POST['oldID'].'.jpg';
    $newName ='../app/img/'.$_POST['id'].'.jpg';
    rename($oldName, $newName);
}

//id ID was not updated and picture was provided
elseif ((!$idWasUpdated)&&($newImageWasProvided)){
    uploadImage($_POST['id']);
}


function uploadImage($fileName_carID){
    $filesDir = "../app/img/";
    //saves a uploaded file with name of car ID
    $file = $filesDir .strtoupper($fileName_carID).'.jpg';
    $fileExtension = pathinfo($file,PATHINFO_EXTENSION);
    $okToUpload = true;

    // Checks if file is a an image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check !== false) {
            $okToUpload = true;
        } else {
            echo "File is not an image. ";
            $okToUpload = false;
        }
    }

    // Checks if file is in specified format
    if($fileExtension != "jpg" && $fileExtension != "jpeg" ) {
        echo "Incorrect File Format. ";
        $okToUpload = false;
    }

    // Checks if file can be uploaded
    if ($okToUpload == false) {
        echo "File was not uploaded. ";
        setUpDefaultImage();

        // if file is ok to be uploaded
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
            echo "<li>Car picture: ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</li>";
        } else {
            echo "Uploading error, try again";
            setUpDefaultImage();
        }
    }
}
?>