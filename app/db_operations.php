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
function addCar($id , $manufacturer, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone, $price, $desc){

    $checkId = "SELECT * FROM `CarSales`.`UsedCars` WHERE `id`='$id'";
    $result = executeQuery($checkId, "CarSales");
    //checks if the record with the provided id already exist in db
    if(mysqli_num_rows($result) < 1){
        //adds a record to db
        $addCar = "INSERT INTO `CarSales`.`UsedCars` (`id`, `manufacturer`, `model`, `colour`,
                    `year`, `type`, `doors`, `cc`, `fuel`, `email`, `phone`, `price`, `description`) VALUES
                    ('$id', '$manufacturer', '$model', '$colour', '$year', '$type',
                     '$doors', '$cc', '$fuel', '$email', '$phone', '$price', '$desc')";
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
    displayListOfCars($getAllCars);
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
            //----------------------------------------------------------------------------------------------------
                    echo "<form name=\"type\" action=\"products.php\" method=\"POST\">";
                    echo "<input type=\"submit\" class=\"widget\" name=\"type\" value=\"".$row['type']."\" />";
                    $numberOfButtons--;
                }
                if($numberOfButtons==0){
                    echo "</form>";
            //----------------------------------------------------------------------------------------------------
                }
            }
        }
    }
    else {
        //----------------------------------------------------------------------------------------------------
        echo "<form name=\"type\"  method=\"POST\">
                <h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"There are no\" /></h3>
                <h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"Cars in DB\" /></h3>
                <h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"At the moment\" /></h3>
              </form>";
        //----------------------------------------------------------------------------------------------------
    }

}

//****************************** Get all cars with specific type  **************************
    function getSpecificType($type){
        $getCars = "SELECT * FROM CarSales.UsedCars WHERE type='$type'";
        displayListOfCars($getCars);
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

            //-------Right panels of Product page ----------------------
                echo "<ul class=\"statistics equal center\">
	                     <li>Price:</li><li> € $row[price]</li>
	                     <li>Make:</li><li> $row[manufacturer]</li>
	                     <li>Model:</li><li>$row[model]</li>
	                     <li>Colour</li><li> $row[colour]:</li>
	                     <li>Year:</li><li> $row[year]</li>
	                    
	                  </ul>

                      <ul class=\"statistics equal center\">
                         <li>Type:</li><li> $row[type]</li>
	                     <li>No of doors:</li><li> $row[doors]</li>
	                     <li>Engine size:</li><li> $row[cc]</li>
	                     <li>Fuel type:</li><li> $row[fuel]</li>
	                     <li>Email:</li><li> $row[email]</li>
	                     <li>Phone:</li><li> $row[phone]</li>
	             
                      </ul>";
            //------------------------------------------------------------
            echo "<article><p>".$row['description']."</p></article>";
            }
        }
    }

//********************** Displays list of cars for Products page *********************
    function displayListOfCars($getCarsFromQuery){
        $resultCars = executeQuery($getCarsFromQuery, "CarSales");
        if (mysqli_num_rows($resultCars) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($resultCars)) {

                //-------Cell element for Products page ----------------------
                echo "<li class='widget equal'>
                          <ul>
                            <li class='equal'>
                              <img src=\"img\\".$row['id'].".jpg\"/>
                            </li>
                            <li>
                              <h4>
                                <a href=\"product.php?id=".$row['id']."\">
                                        $row[manufacturer]"." "."$row[model]
                                        "." "."$row[colour]"." "."$row[year]"." "."$row[type]
                                </a>
                              </h4>
                            </li>
                          </ul>
                        </li>";
                //-------------------------------------------------------------
            }
        }
        else {
            echo "0 results";
        }
    }

//*************** Load cars with specified: make, model, max price ********************
function getMakeModelMaxPrice($make, $model, $maxPrice){
    $getCars = "SELECT * FROM CarSales.UsedCars where manufacturer='$make' and model='$model' and price<='$maxPrice'";
    displayListOfCars($getCars);
}

//*************** Load cars with specified: min year, max price ***********************
function getMinYearMaxPrice($minYear, $maxPrice){
    $getCars = "SELECT * FROM CarSales.UsedCars where year>='$minYear' and price<='$maxPrice'";
    displayListOfCars($getCars);
}

//*************** Load cars with specified: max year, max price ***********************
function getMaxYearMaxPrice($maxYear, $maxPrice){

    $getCars = "SELECT * FROM CarSales.UsedCars where year<='$maxYear' and price<='$maxPrice'";
    displayListOfCars($getCars);
}

//******** Load cars with specified: make, model, min year, max price ******************
function getMakeModelMinYearMaxPrice($make, $model, $minYear, $maxPrice){

    $getCars = "SELECT * FROM CarSales.UsedCars where manufacturer='$make' and model='$model'
                and year>='$minYear' and price<='$maxPrice'";
    displayListOfCars($getCars);
}
//******** Load cars with specified: make, model, max year, max price ******************
function getMakeModelMaxYearMaxPrice($make, $model, $maxYear, $maxPrice){

    $getCars = "SELECT * FROM CarSales.UsedCars where manufacturer='$make' and model='$model'
                and year<='$maxYear' and price<='$maxPrice'";
    displayListOfCars($getCars);
}
//*********** Load cars with specified: min year, max year, max price ******************
function getMinYearMaxYearMaxPrice($minYear, $maxYear, $maxPrice){

    $getCars = "SELECT * FROM CarSales.UsedCars where year>='$minYear' and year<='$maxYear' and price<='$maxPrice'";
    displayListOfCars($getCars);
}
//***** Load cars with specified: make, model, min year, max year, max price ************
function getMakeModelMinYearMaxYearMaxPrice($make, $model, $minYear, $maxYear, $maxPrice){

    $getCars = "SELECT * FROM CarSales.UsedCars where manufacturer='$make' and model='$model'
                and year>='$minYear' and year<='$maxYear' and price<='$maxPrice'";
    displayListOfCars($getCars);
}
?>
