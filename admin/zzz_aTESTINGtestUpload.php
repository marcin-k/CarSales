<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 24/03/2017
 * Time: 19:04
 */
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


echo "></p>
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
                <dt>Car Image:</dt><dd><input type='file' name='fileToUpload' id='fileToUpload'></dd>

                </dl>";

                //<!-- FIX THIS FOR UPDATE-->
                if(isset($_POST['updateDelete']))
                echo "<input name='updateDelete' value='update' hidden>
            </section>
            <button type='submit'>Update</button>";
            else{
            echo "<input name='newRecord' value='newRecord' hidden>
    </section>
    <button type='submit' name='submit' value='submit'>Add</button>";
    }
    echo "      </form>
    </section>
</main >
";
?>
<!--
<main>
	<section>
		<form action="upload.php" method="post" enctype="multipart/form-data">
            <dt>ID:</dt><dd> <input type='text' id='id' name='id' value=$id ><p id=\"idError\"></p></dd>
            <input type="file" name="fileToUpload" id="fileToUpload">
	 		<input type="submit" value="submit" name="submit">

		</form>
	</section>
</main>

-->


