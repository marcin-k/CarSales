<?php
    include 'inc/header.php';
    include "admin_db_operations.php";
?>
<!--GET HEADER-->


<?php
    //if user is not logged in but just entered the url redirect to login page
    if(!isset($_POST['username'])) {
        header('Location: index.php');
    }

    //for logged-in users display the page
    else {
        echo "
            <script src=\"passwordUpdateValidation.js\"></script>
              <main>
                <h3>Settings</h3>
                  <section class=\"full center widget\" >
                  <form onSubmit='return validateNewPassword()' action ='confirmationScreen.php' method = \"post\" enctype = \"multipart/form-data\">
                    <input name='username' value=".$_POST['username']." hidden>
                    <input name='pass' value=".$_POST['pass']." hidden>
                    <input name='updatePassword' value='updatePassword' hidden>
                    <h3>Update your password</h3>
                    <label for=\"pass1\"> New Password</label>
                    <input type = \"password\" name= \"pass1\" id='pass1' value = \"\" >
                    <label for=\"pass2\"> Confirm Password</label>
                    <input type = \"password\" name= \"pass2\" id='pass2'value = \"\" >
                    <p id=\"passError\"></p>
                    <button type = \"submit\" name='logged' value='false'> Update</button>
                  </form >
                  </section >
              </main>
              ";
    }
?>


<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
