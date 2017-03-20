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
        //TODO: add record to db
        echo $_POST['id'];
    }
    //is user is going to update / delete record
    elseif(isset($_POST['updateDelete'])){
        //TODO: update record in db
        if($_POST['updateDelete']=='update'){
            echo $_POST['id'];
        }
        //TODO: delete record
        elseif ($_POST['updateDelete']=='delete'){
            echo $_POST['id'];
        }
    }


    echo "
              <main>
                  <section class=\"full center widget\" >
                  <form  action ='index.php' method = \"post\" enctype = \"multipart/form-data\">
                    <input name='username' value=".$_POST['username']." hidden>";

                    if(isset($_POST['updatePassword'])){
                        echo "<input name='pass' value=".$_POST['pass2']." hidden>";
                        echo "<h3>Your password has been updated</h3>";
                    }
                    elseif(isset($_POST['newRecord'])){
                        echo "<input name='pass' value=".$_POST['pass']." hidden>";
                        echo "New record";
                    }
                    elseif(isset($_POST['updateDelete'])){
                        if($_POST['updateDelete']=='update'){
                            echo "<h3>Updating</h3>";
                            echo "<input name='pass' value=".$_POST['pass']." hidden>";
                        }
                        elseif ($_POST['updateDelete']=='delete'){
                            echo "<h3>Deleting</h3>";
                            echo "<input name='pass' value=".$_POST['pass']." hidden>";
                        }
                    }


    echo "        <button type = \"submit\" name='logged' value='false'> Back to Dashboard</button>
                  </form >
                  </section >
              </main>
              ";
}

//--GET FOOTER-
include 'inc/footer.php';
?>