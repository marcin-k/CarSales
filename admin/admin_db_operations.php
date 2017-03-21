<?php
/**
 * Created by phpStorm
 * User: marcin
 * Date: 03/03/2017
 * Time: 22:28
 */
//Method to execute any queries on db
function executeQuery($query, $schema){
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', $schema);
    // Check connection
    if (!$conn) {
        die("<h2>DB Connection failed: " . mysqli_connect_error())."</h2>";
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
function addCar($id , $manufacturer, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone, $price, $desc){
    //Converts id to uppercase
    $id = strtoupper($id);
    $checkId = "SELECT * FROM `CarSales`.`UsedCars` WHERE `id`='$id'";
    $result = executeQuery($checkId, "CarSales");
    //checks if the record with the provided id already exist in db
    if(mysqli_num_rows($result) == 0){
        //adds a record to db
        $addCar = "INSERT INTO `CarSales`.`UsedCars` (`id`, `manufacturer`, `model`, `colour`,
                    `year`, `type`, `doors`, `cc`, `fuel`, `email`, `phone`, `price`, `description`) VALUES
                    ('$id', '$manufacturer', '$model', '$colour', '$year', '$type',
                     '$doors', '$cc', '$fuel', '$email', '$phone', '$price', '$desc')";
        executeQuery($addCar, "CarSales");
        echo "<li>
                Added Successfully -  '$id', '$manufacturer', '$model'
              </li>
        ";
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
//******************************** Update a record  ********************************

function update($id , $manufacturer, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone){
    $updateQuery = "UPDATE `CarSales`.`UsedCars` SET `manufacturer`='$manufacturer', `model`='$model',
                    `colour`='$colour', `year`='$year', `type`='$type', `doors`='$doors', `cc`='$cc',
                    `fuel`='$fuel', `email`='$email', `phone`='$phone' WHERE `id`='$id'";
    executeQuery($updateQuery, "CarSales");
}

//******************************** Retrieves all cars from DB  ********************************

function getAllCarsInDB(){
    $getAllCars = "SELECT * FROM CarSales.UsedCars";
    displayListOfCars($getAllCars);
}

//******************************** Update a password  ********************************

function updatePassword($username, $newPass){
    $updateQuery = "UPDATE `CarSales`.`Admins` SET `password`='$newPass' WHERE `login`='$username'";
    //
    return executeQuery($updateQuery, "CarSales");
}


//********************** Displays list of cars to edit *********************
function displayListOfCars(){
    $getAllCars = "SELECT * FROM CarSales.UsedCars";
    $resultCars = executeQuery($getAllCars, "CarSales");
    if (mysqli_num_rows($resultCars) > 0) {
//TODO: form have to go to add_update_item.php first then to confirmation

        // output data of each row
        while ($row = mysqli_fetch_assoc($resultCars)) {

            //-------Cell element for edit_existing.php page ----------------------
            echo "<form name='type' class ='feature equal center' action='add_update_item.php' method='POST'>
                        <li class='widget'>
                          <ul>
                              <h4>
                                ".$row['id']." 
                                        $row[manufacturer]"." "."$row[model]
                                        "." "."$row[colour]"." "."$row[year]"." "."$row[type].
                              </h4>  
                              <input name='id' value='".$row['id']."' hidden>
                                <input name='username' value=".$_POST['username']." hidden>
                                <input name='pass' value=".$_POST['pass']." hidden>
                              <input type='submit' name='updateDelete' value='update'>
                  </form>
                  <form name='type' class ='feature equal center' action='confirmationScreen.php' method='POST'>
                                <input name='id' value='".$row['id']."' hidden>
                                <input name='username' value=".$_POST['username']." hidden>
                                <input name='pass' value=".$_POST['pass']." hidden>
                              <input type='submit' name='updateDelete' value='delete'>
                            
                          </ul>
                        </li>";
            echo "</form>";
            //-------------------------------------------------------------
        }

    }
    else {
        echo "0 results";
    }
}