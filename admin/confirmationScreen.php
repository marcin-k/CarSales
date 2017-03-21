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
}

//for logged-in users display the page
else {
    //if user coming from update password page
    if(isset($_POST['updatePassword'])){
        updatePassword($_POST['username'], $_POST['pass2']);
    }
    //if user coming to add new record
    elseif(isset($_POST['newRecord'])){
        //make sure all fields are set or set to null
        $id = ifEmptySetToNull('id');
        $phone = ifEmptySetToNull('phone');
        $type= ifEmptySetToNull('type');
        $fuel= ifEmptySetToNull('fuel');
        $make= ifEmptySetToNull('make');
        $model= ifEmptySetToNull('model');
        $year= ifEmptySetToNull('year');
        $doors= ifEmptySetToNull('doors');
        $email= ifEmptySetToNull('email');
        $price= ifEmptySetToNull('price');
        $cc= ifEmptySetToNull('cc');
        $desc= ifEmptySetToNull('desc');
        $colour= ifEmptySetToNull('colour');
    }
    //is user is going to update / delete record
    elseif(isset($_POST['updateDelete'])){
        //TODO: update record in db
        if($_POST['updateDelete']=='update'){
            echo $_POST['id'];
        }
        //TODO: delete record
        elseif ($_POST['updateDelete']=='delete'){
            deleteCar($_POST['id']);
        }
    }


    echo "
              <main>
                  <section class=\"full center widget\" >
                  <form  action ='index.php' method = \"post\" enctype = \"multipart/form-data\">
                    <input name='username' value=".$_POST['username']." hidden>";

                    if(isset($_POST['updatePassword'])){
                        echo "<input name='pass' value=".$_POST['pass2']." hidden>";
                        $updateStatus = updatePassword($_POST['username'], $_POST['pass2']);
                        echo "<h3>Your password has been updated-".$updateStatus."</h3>";
                    }
                    elseif(isset($_POST['newRecord'])){
                        echo "<input name='pass' value=".$_POST['pass']." hidden>";
                        addCar($id , $make, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone, $price, $desc);
                    }
                    elseif(isset($_POST['updateDelete'])){
                        if($_POST['updateDelete']=='update'){
                            echo "<h3>Updating</h3>";
                            echo "<input name='pass' value=".$_POST['pass']." hidden>";
                        }
                        elseif ($_POST['updateDelete']=='delete'){
                            echo "<h3>Car with id ".$_POST['id']." has been deleted</h3>";
                            echo "<input name='pass' value=".$_POST['pass']." hidden>";
                        }
                    }


    echo "        <button type = \"submit\" name='logged' value='false'> Back to Dashboard</button>
                  </form >
                  </section >
              </main>
              ";
}
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