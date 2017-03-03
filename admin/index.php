<?php
    include 'inc/header.php';
    include "admin_db_operations.php";
?>
<!--GET HEADER-->
<?php
    //if user already entered username and password
    if(isset($_POST['tryingToLogin'])){

        //if username and password were not entered
        if(empty($_POST['username'])&&empty($_POST['pass'])){
            echo "Please enter username and password";
        }

        //if no username was not entered
        elseif(empty($_POST['username'])&&!empty($_POST['pass'])){
            echo "Please enter username";
        }

        //if no password was not entered
        elseif(empty(!$_POST['username'])&&empty($_POST['pass'])){
            echo "Please enter password";
        }

        //if login details entered
        else{
            $loginValidator = validateLogin($_POST['username'], $_POST['pass']);
            if($loginValidator==="login successful"){
                echo "login successful";
            }
            else{
                echo $loginValidator;
            }
        }
    }
//----------------------------------------------------------------------------------------------------------------
    //if did not log in yet
    else {
        echo "
        <main>
            <section class=\"full center widget\" >
                <form action = 'index.php' method = \"post\" enctype = \"multipart/form-data\" >
                    <label for=\"user\"> Username</label>
                    <input type = \"username\" name= \"username\" value = \"\" >
                    <label for=\"pass\"> Password</label>
                    <input type = \"password\" name= \"pass\" value = \"\" >
                    <button type = \"submit\" name='tryingToLogin' value='login'> Submit</button>
                </form >
            </section >
        </main >
        ";
}
?>
<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
