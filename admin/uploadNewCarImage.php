
<?php

    //checks if the file was entered
    // If file was not entered system generates a default image for the car
    if($_FILES["fileToUpload"]["error"] != 0){
        echo "Image file was not provided. ";
        //setting copy of a default image
        setUpDefaultImage();
    }
    //file was entered
    else{
        $filesDir = "../app/img/";
        //saves a uploaded file with name of car ID
        $file = $filesDir .strtoupper($_POST['id']).'.jpg';
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

    function setUpDefaultImage(){
        $file = '../app/img/7.jpg';
        $newFile = '../app/img/'.$_POST['id'].'.jpg';

        if (!copy($file, $newFile)) {
            echo "failed to set up a default image";
        }
    }
?>
