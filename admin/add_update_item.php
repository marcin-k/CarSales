<?php
    include 'inc/header.php';
    include "admin_db_operations.php";
?>
<!--GET HEADER-->

<?php

//is user is going to update
if(isset($_POST['updateDelete'])){
    //sets the values in the fields
    $id = $_POST['id'];
    $make= getValue($id, 'manufacturer');
    $model=getValue($id, 'model');
    $year=  getValue($id, 'year');
    $doors= getValue($id, 'doors');
    $email = getValue($id, 'email');
    $phone = getValue($id, 'phone');
    $price = getValue($id, 'price');
    $doors =getValue($id, 'doors');
    $desc = getValue($id, 'description');
    $colour=getValue($id, 'colour');
    $cc=getValue($id, 'cc');
    //TODO: set value in the form
    $type=getValue($id, 'type');
    $fuel=getValue($id, 'fuel');
}
else{
    $id = "";
    $make="";
    $model="";
    $year=  "";
    $doors= "";
    $email = "";
    $phone = "";
    $price = "";
    $doors ="";
    $desc = "";
    $colour="";
    $cc="";
    $type="";
    $fuel="";
}





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
            <form class=\"widget\" name='addForm' onSubmit='return validateInput()' method='post' action ='confirmationScreen.php' >
            <section class=\"equal\">
                <input name='username' value=".$_POST['username']." hidden>
                <input name='pass' value=".$_POST['pass']." hidden>

                <dl class=\"\">
                <dt>ID:</dt><dd> <input type='text' id='id' name='id' value=$id ><p id=\"idError\"></p></dd>
                <dt>Manufacturer:</dt><dd> <input type='text' name='make' id='make' value=$make><p id=\"makeError\"></p></dd>
                <dt>Model:</dt><dd><input type='text' id='model' name='model' value=$model><p id=\"modelError\"></p></dd>
                <dt>Colour:</dt><dd> <input type='text' name='colour' value=$colour></dd>
                <dt>Year:</dt><dd> <input type='number' id='year' name='year' value=$year><p id=\"yearError\"></p></dd>
                <dt>Type:</dt><p id=\"typeError\"></p>
                    <dd>
                        <label>Saloon</label>
                        <input type='radio' name='type' id='saloon' value='saloon' "; if($type=='saloon'){ echo "checked"; }
                        echo ">
                        <label>Estate</label>
                        <input type='radio' name='type' id='estate' value='estate' "; if($type=='estate'){ echo "checked"; }
                        echo ">
                        <label>Coupe</label>
                        <input type='radio' name='type' id='coupe' value='coupe' "; if($type=='coupe'){ echo "checked"; }
                        echo ">
                        <label>Hatchback</label>
                        <input type='radio' name='type' id='hatchback' value='hatchback' "; if($type=='hatchback'){ echo "checked"; }
                        echo ">
                        <label>7-seater</label>
                        <input type='radio' name='type' id='7-seater' value='7-seater' "; if($type=='7-seater'){ echo "checked"; }
                        echo ">
                    </dd>
                <dt>Doors:</dt><dd> <input type='text' id='doors' name='doors'
                                            onkeypress='validateForLettersOrNumbersOnly(event, /^[1-7]|\1/)' value=$doors>
                                    <p id=\"doorsError\"></p></dd>
                </section>
                <section class=\"equal\">

                <dt>Engine:</dt><dd> <input type='text' name='cc' value=$cc></dd>
                <dt>Fuel:</dt><p id=\"fuelError\"></p>
                    <dd>
                        <label>Petrol</label>
                        <input type='radio' name='fuel' id='petrol' value='petrol' "; if($fuel=='petrol'){ echo 'checked'; }
                        echo ">
                        <label>Diesel</label>
                        <input type='radio' name='fuel' id='diesel' value='diesel' "; if($fuel=='diesel'){ echo 'checked'; }
                        echo ">
                        <label>Gas</label>
                        <input type='radio' name='fuel' id='gas' value='gas' "; if($fuel=='gas'){ echo 'checked'; }
                        echo ">
                        <label>Electric</label>
                        <input type='radio' name='fuel' id='electric' value='electric' "; if($fuel=='electric'){ echo 'checked'; }
                        echo ">
                    </dd>
                <dt>Email:</dt><dd> <input type='text' id='email' name='email' value=$email><p id=\"emailError\"></p></dd>
                <dt>Phone:</dt><dd> <input type='text' id='phone' name='phone' onkeypress='validateForLettersOrNumbersOnly(event, /[0-9]|/)'
                                           value=$phone><p id=\"phoneError\"></p></dd>
                <dt>Price:</dt><dd> <input type='text' id='price' name='price' onkeypress='validateForLettersOrNumbersOnly(event, /[0-9]|/)'
                                           value=$price></dd>
                <dt>Description:</dt><dd> <textarea name='desc'>$desc</textarea></dd>

                </dl>";

   //<!-- FIX THIS FOR UPDATE-->
                if(isset($_POST['updateDelete']))
                    echo "<input name='updateDelete' value='update' hidden>
                          </section>
                          <button type='submit'>Update</button>";
                else{
                    echo "<input name='newRecord' value='newRecord' hidden>
                          </section>
                          <button type='submit'>Add</button>";
                }
    echo "      </form >
    <form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
      <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
      <input type=\"submit\" value=\"Upload Image\" name=\"submit\">
    </form>
          </section >
        </main >
    ";
}
?>

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
