<?php
    include 'inc/header.php';
    include "admin_db_operations.php";
?>
<!--GET HEADER-->

<?php

$id = "";

$email = "";
$phone = "";
$price = "";
$doors ="";
$desc = "";


//if user is not logged in but just entered the url redirect to login page
if(!isset($_POST['username'])) {
    header('Location: index.php');
}

//for logged-in users display the page
else {
    echo "
        <script src=\"inputValidation.js\"></script>

        <main >
          <section >
            <h3 > Add new car / update car </h3 >
            <form name='addForm' onSubmit='return validateInput()' method='post' action ='confirmationScreen.php' >
                <input name='username' value=".$_POST['username']." hidden>
                <input name='pass' value=".$_POST['pass']." hidden>
            
                <dl class=\"\">
                <dt>ID:</dt><dd> <input type='text' id='id' name='id' value=$id><p id=\"idError\"></p></dd>
                <dt>Manufacturer:</dt><dd> <input type='text' id='make'><p id=\"makeError\"></p></dd>
                <dt>Model:</dt><dd><input type='text' id='model'><p id=\"modelError\"></p></dd>
                <dt>Colour:</dt><dd> <input type='text'></dd>
                <dt>Year:</dt><dd> <input type='number' id='year' ><p id=\"yearError\"></p></dd>
                <dt>Type:</dt><p id=\"typeError\"></p>
                    <dd> 
                        <label>Saloon</label>
                        <input type='radio' name='type' id='saloon' value='saloon'>
                        <label>Estate</label>
                        <input type='radio' name='type' id='estate' value='estate'>
                        <label>Coupe</label>
                        <input type='radio' name='type' id='coupe' value='coupe'>
                        <label>Hatchback</label>
                        <input type='radio' name='type' id='hatchback' value='hatchback'>  
                        <label>7-seater</label>
                        <input type='radio' name='type' id='7-seater' value='7-seater'>
                    </dd>
                <dt>Doors:</dt><dd> <input type='text' id='doors' onkeypress='validateForLettersOrNumbersOnly(event, /^[1-7]|\1/)' value=$doors>
                                    <p id=\"doorsError\"></p></dd>
                <dt>Engine:</dt><dd> <input type='text'></dd>
                <dt>Fuel:</dt><p id=\"fuelError\"></p>
                    <dd>
                        <label>Petrol</label>
                        <input type='radio' name='fuel' id='petrol' value='petrol'>
                        <label>Diesel</label>
                        <input type='radio' name='fuel' id='diesel' value='diesel'>
                        <label>Gas</label>
                        <input type='radio' name='fuel' id='gas' value='gas'>
                        <label>Electric</label>
                        <input type='radio' name='fuel' id='electric' value='electric'>  
                    </dd>
                <dt>Email:</dt><dd> <input type='text' id='email' value=$email><p id=\"emailError\"></p></dd>
                <dt>Phone:</dt><dd> <input type='text' id='phone' onkeypress='validateForLettersOrNumbersOnly(event, /[0-9]|/)' 
                                           value=$phone><p id=\"phoneError\"></p></dd>
                <dt>Price:</dt><dd> <input type='text' id='price' onkeypress='validateForLettersOrNumbersOnly(event, /[0-9]|/)'
                                           value=$price></dd>
                <dt>Description:</dt><dd> <input type='text' value=$desc></dd>

                </dl>
                <!-- FIX THIS FOR UPDATE-->
                <input name='newRecord' value='newRecord' hidden>
                <button type='submit'>Add</button>
            </form >
          </section >
        </main >
    ";
}
?>

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
