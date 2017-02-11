<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 20/01/2017
 * Time: 21:03
 */

//Method to execute any queries on db
function executeQuery($query, $schema){
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', $schema);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $query);
    //if((!$result)){
    //    echo "<h2>SQL Error </h2></br>";
    //}
    return $result;
    mysqli_close($conn);
}
//******************************** Validate Login ********************************

//Page would call that method should validate that parameters are set:
// if(isset($_POST["login"]))
// if(isset($_POST["password"]))
function validateLogin($username, $password){
    $toReturn="";
    $sql = "SELECT * FROM `CarSales`.`Admins` WHERE login ='$username'";
    $result = executeQuery($sql, "CarSales");
    //Checks if there is exactly one record for a provided username
    if (mysqli_num_rows($result) <> 1) {
        $toReturn =  "incorrect username";
    } else {
        //Password validation
        while ($row = mysqli_fetch_assoc($result)) {
            if (md5($row['password']) != md5($password)) {
                $toReturn =  "incorrect password";
            } else {
                $toReturn =  "login successful";
            }
        }
    }
    return $toReturn;
}
//******************************** Adds new car to DB ********************************
function addCar($id , $manufacturer, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone){

    $checkId = "SELECT * FROM `CarSales`.`UsedCars` WHERE `id`='$id'";
    $result = executeQuery($checkId, "CarSales");
    //checks if the record with the provided id already exist in db
    if(mysqli_num_rows($result) < 1){
        //adds a record to db
        $addCar = "INSERT INTO `CarSales`.`UsedCars` (`id`, `manufacturer`, `model`, `colour`,
                    `year`, `type`, `doors`, `cc`, `fuel`, `email`, `phone`) VALUES
                    ('$id', '$manufacturer', '$model', '$colour', '$year', '$type',
                     '$doors', '$cc', '$fuel', '$email', '$phone')";
        executeQuery($addCar, "CarSales");
    }
    else{
        echo "Car with ID: ".$id." already exist in DB</br>";
    }
}

//******************************** Delete a car from DB ********************************

function deleteCar($id){
    $deleteQuery = "Delete from `CarSales`.`UsedCars` WHERE `id`='$id'";
    executeQuery($deleteQuery, "CarSales");

}
//******************************** Retrieves all cars from DB  ********************************

function getAllCarsInDB(){

    $getAllCars = "SELECT * FROM CarSales.UsedCars";
    $resultCars = executeQuery($getAllCars, "CarSales");

    if (mysqli_num_rows($resultCars) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($resultCars)) {
            echo '<ul>';
            echo    "<li class='car'><a href=\"product.php?id=".$row['id']."\">
                            $row[manufacturer]"." "."$row[model]
                            "." "."$row[colour]"." "."$row[year]"." "."$row[type]
                     </href></li>";
            echo '</ul>';
        }

    }
    else {
        echo "0 results";
    }
}

//******************************** Update a record  ********************************

function update($id , $manufacturer, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone){
    $updateQuery = "UPDATE `CarSales`.`UsedCars` SET `manufacturer`='$manufacturer', `model`='$model',
                    `colour`='$colour', `year`='$year', `type`='$type', `doors`='$doors', `cc`='$cc',
                    `fuel`='$fuel', `email`='$email', `phone`='$phone' WHERE `id`='$id'";
    executeQuery($updateQuery, "CarSales");
}

//****************************** Get 3 most popular types  **************************
function getTopThree(){
    //Query counts all the car types and list them in descending order
    $getTopThree = "SELECT type, COUNT(*) FROM UsedCars GROUP BY type ORDER BY COUNT(*) DESC";
    $result = executeQuery($getTopThree, "CarSales");
    if($result!=null){
        if (mysqli_num_rows($result) > 2) {
            $numberOfButtons = 3;
            while ($row = mysqli_fetch_assoc($result)) {
                if($numberOfButtons>0){
                    echo "<form name=\"type\" action=\"products.php\" method=\"POST\">";
                    echo "<input type=\"submit\" class=\"widget\" name=\"type\" value=\"".$row['type']."\" />";
                    $numberOfButtons--;
                }
                if($numberOfButtons==0){
                    echo "</form>";
                }
            }
        }
    }
    else {
        echo "<form name=\"type\"  method=\"POST\">";
        echo "<h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"There are no\" /></h3>";
        echo "<h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"Cars in DB\" /></h3>";
        echo "<h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"At the moment\" /></h3>";
        echo "</form>";

    }

}

//****************************** Get all cars with specific type  **************************
    function getSpecificType($type){

        $getAllCars = "SELECT * FROM CarSales.UsedCars WHERE type='$type'";
        $resultCars = executeQuery($getAllCars, "CarSales");

        if (mysqli_num_rows($resultCars) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($resultCars)) {
                echo '<ul>';
                echo    "<li class='car'><a href=\"product.php?id=".$row['id']."\">
                            $row[manufacturer]"." "."$row[model]
                            "." "."$row[colour]"." "."$row[year]"." "."$row[type]
                          </href></li>";
                echo '</ul>';
            }

        }
        else {
            echo "0 results";
        }
    }
//****************************** Get details of specific car **************************
    function getDetailsOfSpecificCar($id){
        $getDetails = "SELECT * FROM CarSales.UsedCars WHERE id='$id'";
        $result = executeQuery($getDetails, "CarSales");
        //Checks if there is exactly one record for a provided id
        if (mysqli_num_rows($result) <> 1) {
            echo "<h1>Incorrect car ID</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<ul class=\"statistics equal center\">
	                     <li>Make:</li>
	                     <li>Model:</li>
	                     <li>Colour:</li>
	                     <li>Year:</li>
	                     <li>Type:</li>
	                     <li>No of doors:</li>
	                     <li>Engine size:</li>
	                     <li>Fuel type:</li>
	                     <li>Contact email:</li>
	                     <li>Contact phone:</li>
	                  </ul>

                      <ul class=\"statistics equal center\">
                         <li>$row[manufacturer]</li>
                         <li>$row[model]</li>
	                     <li>$row[colour]</li>
	                     <li>$row[year]</li>
	                     <li>$row[type]</li>
	                     <li>$row[doors]</li>
	                     <li>$row[cc]</li>
	                     <li>$row[fuel]</li>
	                     <li>$row[email]</li>
	                     <li>$row[phone]</li>
                      </ul>";
                }
        }
    }
//******************************* Get all manufacturers in DB ************************

/* Temporally moved to index.php and db.php

    function getAllMakes(){
        $getMakes = "SELECT distinct manufacturer FROM UsedCars";
        $result = executeQuery($getMakes, "CarSales");

        if (mysqli_num_rows($result) < 1) {
            echo "<option >DB is empty</option>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"".$row['manufacturer']."\">".ucfirst($row['manufacturer'])."</option>";
            }
        }
    }
    */
?>
