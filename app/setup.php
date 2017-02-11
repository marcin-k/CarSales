<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 21/01/2017
 * Time: 17:07
 */
//Deletes schema if already exist
$dropSchema = "DROP Schema IF EXISTS `CarSales`";
executeQuery($dropSchema, "Deleting Car Sales Schema if exist");


//Creates new Schema
$createSchema = "CREATE SCHEMA `CarSales`";
executeQuery($createSchema, "Creating Car Sales Schema");

//Creates a UsedCars table
$createUsedCarsTable = "CREATE TABLE `CarSales`.`UsedCars` (`id` varchar(25) NOT NULL, `manufacturer` varchar(45) DEFAULT NULL, 
`model` varchar(45) DEFAULT NULL,`colour` varchar(45) DEFAULT NULL, `year` int(4) DEFAULT NULL, 
`type` enum('saloon','estate','coupe','hatchback','7-seater') DEFAULT NULL,`doors` int(1) DEFAULT NULL, `cc` int(5) DEFAULT NULL, 
`fuel` enum('petrol','diesel','gas','electric') DEFAULT NULL, `email` varchar(45) DEFAULT NULL, `phone` int(15) DEFAULT NULL, 
`price` int(7) DEFAULT NULL, `description` VARCHAR(200) NULL,
PRIMARY KEY (`id`))";
executeQuery($createUsedCarsTable, "Creating Used Car Table");

//creates a admin table
$createAdminTable = "CREATE TABLE `CarSales`.`Admins` (`login` varchar(25) NOT NULL,`password` varchar(45) NOT NULL,
PRIMARY KEY (`login`))";
executeQuery($createAdminTable, "Creating Admin Table");

//adds the admin accounts to admin table
$addFirstAdmin = "INSERT INTO `CarSales`.`Admins` (`login`, `password`) VALUES ('marcin', 'abc123')";
$addSecondAdmin = "INSERT INTO `CarSales`.`Admins` (`login`,`password`) VALUES ('mark', 'abc123')";
$addThirdAdmin = "INSERT INTO `CarSales`.`Admins` (`login`,`password`) VALUES ('anuraj', 'abc123')";
executeQuery($addFirstAdmin, "Adding First Admin");
executeQuery($addSecondAdmin, "Adding Second Admin");
executeQuery($addThirdAdmin, "Adding Third Admin");

//------------------------------------------------------------------------------------------------
//Method to execute any queries on db
function executeQuery($query, $comment){

    $conn = mysqli_connect('localhost', 'root', '');
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $query);
    if((!$result)){
        echo $comment."<span style=\"color:red\"> - failed due to SQL error</span></br>";
    }
    else{
        echo $comment."<span style=\"color:green\"> - completed successfully</span></br>";
    }
    mysqli_close($conn);
}
?>

