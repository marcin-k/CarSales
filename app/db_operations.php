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

//******************************** Retrieves all cars from DB  ********************************

function getAllCarsInDB(){
    $getAllCars = "SELECT * FROM CarSales.UsedCars";
    displayListOfCars($getAllCars);
}

//****************************** Make selection dropdown  **************************
function getMakeDropDownSelection(){
    $sql="SELECT distinct manufacturer FROM UsedCars";
    $result = executeQuery($sql, "CarSales");
    while($row = mysqli_fetch_assoc($result)) {
        $id=$row['manufacturer'];
        echo '<option value="'.$id.'">'.$id.'</option>';
    }
}
//****************************** Model selection dropdown  **************************
function getModelDropDownSelection($id){
    $sql="SELECT distinct model FROM CarSales.UsedCars where manufacturer='$id'";
    $result = executeQuery($sql, "CarSales");
    while($row = mysqli_fetch_assoc($result)) {
        $id=$row['model'];
        echo '<option value="'.$id.'">'.$id.'</option>';
    }
}
//****************************** Get 3 most popular types  **************************
function getTopThree(){
    //Query counts all the car types and list them in descending order
    $getTopThree = "SELECT type, COUNT(*) FROM UsedCars GROUP BY type ORDER BY COUNT(*) DESC";
    $result = executeQuery($getTopThree, "CarSales");
    if($result!=null){
        if (mysqli_num_rows($result) > 2) {
            $numberOfButtons = 3;
            echo "<form name=\"type\" class =\"feature equal center\" action=\"products.php\" method=\"POST\">";
            while ($row = mysqli_fetch_assoc($result)) {
                if($numberOfButtons>0){
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
        //----------------------------------------------------------------------------------------------------
        echo "<form name=\"type\"  method=\"POST\">
                <h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"There are no\" /></h3>
                <h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"Cars in DB\" /></h3>
                <h3><input type=\"submit\" class=\"widget\" name=\"type\" value=\"At the moment\" /></h3>
              </form>";
        //----------------------------------------------------------------------------------------------------
    }

}

//****************************** Get all cars with specific type  *********************
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
                echo "<dl class=\"statistics equal center\">

	                     <dt>Make:</dt><dd> $row[manufacturer]</dd>
	                     <dt>Model:</dt><dd>$row[model]</dd>
	                     <dt>Colour:</dt><dd> $row[colour]</dd>
	                     <dt>Year:</dt><dd> $row[year]</dd>
                       <dt>Type:</dt><dd> $row[type]</dd>
		                  </dl>

                      <dl class=\"statistics equal center\">
	                     <dt>Doors:</dt><dd> $row[doors]</dd>
	                     <dt>Engine:</dt><dd> $row[cc]</dd>
	                     <dt>Fuel:</dt><dd> $row[fuel]</dd>
	                     <dt>Email:</dt><dd> $row[email]</dd>
	                     <dt>Phone:</dt><dd> $row[phone]</dd>

                      </dl>";
            //------------------------------------------------------------
            echo "
            <article class=\"center\">
              <p>
                <strong>Price - €$row[price]</strong>
                ".$row['description']."
              </p>
            </article>";
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
                echo "<li class='widget'>
                          <ul>
                            <li class=''>
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
//********* Returns make or model(based on value passed in) for a given ID ***********
function getModelOrMakeBasedOnID($id, $makeOrModel){
    $getMakeOrModel = "SELECT ".$makeOrModel." FROM CarSales.UsedCars where id='$id'";
    $result = executeQuery($getMakeOrModel, "CarSales");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $toReturn = $row[$makeOrModel];
        }
    }
    return $toReturn;
}

//*************** Load cars with specified: make only 8*******************************
function getMake($make){
    $getCars = "SELECT * FROM CarSales.UsedCars where manufacturer='$make'";
    displayListOfCars($getCars);
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
