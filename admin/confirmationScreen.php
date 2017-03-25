<?php
//--GET HEADER--
include 'inc/header.php';
include "admin_db_operations.php";

/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 18/03/2017
 * Time: 18:59
 */

//if user is not logged in but just entered the url redirect to login page
if(!isset($_POST['username'])) {
    header('Location: index.php');
}//

//for logged-in users display the page
else {
    echo $_POST['oldID']." <--old | new--> ".$_POST['id'];
    //checks if user is trying to add new record or update existing one
    //if so checks if the new id is not already in use

    //if user is updating the car and changing the id or creates new listing
    if (isset($_POST['oldID'])&&($_POST['oldID']!=$_POST['id'])){
        $isIdUsed=isIdAlreadyUsed($_POST['id']);

        if(!$isIdUsed){
            include 'confirmationScreenContent.php';
        }
        else{
    //TODO: display the form again
            echo "id is already used";

        }
    }
    //id is not being affected by current operation
    else{
        include 'confirmationScreenContent.php';
    }
}

//--GET FOOTER-
include 'inc/footer.php';
?>