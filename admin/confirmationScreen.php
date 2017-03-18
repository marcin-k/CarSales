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
    if(isset($_POST['update'])){
        updatePassword($_POST['username'], $_POST['pass2']);
    }
    echo "
              <main>
                  <section class=\"full center widget\" >
                  <form  action ='index.php' method = \"post\" enctype = \"multipart/form-data\">
                    <input name='username' value=".$_POST['username']." hidden>
                    <input name='pass' value=".$_POST['pass2']." hidden>";
                    if(isset($_POST['update'])){
                        echo "<h3>Your password has been updated</h3>";
                    }
                    //TODO: check for update record, deletion, new record


    echo "        <button type = \"submit\" name='logged' value='false'> Back to Dashboard</button>
                  </form >
                  </section >
              </main>
              ";
}



//--GET FOOTER-
include 'inc/footer.php';
?>