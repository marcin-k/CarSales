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
//make sure all fields are set or set to null
$id = ifEmptySetToNull('id');
$phone = ifEmptySetToNull('phone');
$type = ifEmptySetToNull('type');
$fuel = ifEmptySetToNull('fuel');
$make = ifEmptySetToNull('make');
$model = ifEmptySetToNull('model');
$year = ifEmptySetToNull('year');
$doors = ifEmptySetToNull('doors');
$email = ifEmptySetToNull('email');
$price = ifEmptySetToNull('price');
$cc = ifEmptySetToNull('cc');
$desc = ifEmptySetToNull('desc');
$colour = ifEmptySetToNull('colour');
$oldID = ifEmptySetToNull('oldID');

//if user is not logged in but just entered the url redirect to login page
if(!isset($_POST['username'])) {
    header('Location: index.php');
}//

//for logged-in users display the page
else {
    //checks if user is trying to add new record or update existing one
    //if so checks if the new id is not already in use

    //if user is updating the car and changing the id or creates new listing
    if (isset($_POST['oldID'])&&($_POST['oldID']!=$_POST['id'])){
        $isIdUsed=isIdAlreadyUsed($_POST['id']);

        if(!$isIdUsed){
            include 'confirmationScreenContent.php';
        }
        else{
            //id is already in use display the form with error message
            getForm(true, $id, $oldID, $make, $model, $year, $doors, $email,
                $phone, $price, $doors, $desc, $colour, $cc, $type, $fuel);
        }
    }
    //id is not being affected by current operation
    else{
        include 'confirmationScreenContent.php';
    }
}

//when creating new record set the value of the attribute to either
//value provided or if not provided to null
function ifEmptySetToNull($parameter){
    //if value is not provided set it to null
    if(!isset($_POST[$parameter])){
        return null;
    }
    else{
        return $_POST[$parameter];
    }
}
//--GET FOOTER-
include 'inc/footer.php';
?>