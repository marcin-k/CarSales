<?php
    include 'inc/header.php';
    include "admin_db_operations.php";
    include 'dashboard.php';
?>
<!--GET HEADER-->
<?php

    //if entering website first time login page is displayed
    if(!isset($_POST['username'])){
        printForm('null');
    }

    //if password and login were already entered
    elseif(isset($_POST['username'])){
        $loginValidator = validateLogin($_POST['username'], $_POST['pass']);
        //if username and password is correct dashboard is displayed
        if($loginValidator==="login successful"){
            //go to dashboard
            getDashboard($_POST['username'], $_POST['pass']);
        }
        //if username or password are incorrect display message
        else{
            printForm($loginValidator);
        }
    }

    //display the login page with optional error message (e.g. incorrect password/username)
    function printForm($message){
        echo "
                <main>
                    <section class=\"full center login\" >
                        <form  class=\"large widget\" action = 'index.php' method = \"post\" enctype = \"multipart/form-data\" >";

                //if user is visiting the page for the first time
                if($message!=='null') {
                    echo "<label style = 'color: red' > " . $message . "</label >";
                }
                    echo "<label for=\"user\"> Username</label>
                            <input type = \"username\" name= \"username\" value = \"\" >
                            <label for=\"pass\"> Password</label>
                            <input type = \"password\" name= \"pass\" value = \"\" >
                            <button type = \"submit\" name='logged' value='false'> Submit</button>
                        </form >
                    </section >
                </main >
                ";
    }

?>
<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
