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
        echo '<table cellpadding="0" cellspacing="15" class="db-table" border="2px">';
        echo '<tr><th> ID </th><th> Manufacturer </th><th> Model </th><th> Colour </th>
                <th> Year </th><th> Type </th><th> Doors </th><th> CC </th><th> Fuel </th>
                <th> Email </th><th> Phone </th></tr>';
        // output data of each row
        while ($row = mysqli_fetch_assoc($resultCars)) {
            echo '<tr>';
            echo "<td>$row[id]</td><td>$row[manufacturer]</td><td>$row[model]</td>
                  <td>$row[colour]</td><td>$row[year]</td><td>$row[type]</td>
                  <td>$row[doors]</td><td>$row[cc]</td><td>$row[fuel]</td>
                  <td>$row[email]</td><td>$row[phone]</td>";
            echo '</tr>';
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
?>