<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 21/01/2017
 * Time: 19:49
 */
include "db_operations.php";
echo "**************************************************</br>";
echo "*******-------------Adding few cars into db------------*******</br>";
echo "**************************************************</br>";
addCar("1" , "opel", "corsa", "blue", "2016", "saloon", "2", "22", "petrol", "bgfg@gmail.com", "123");
addCar("2" , "bmw", "3", "red", "2004", "estate", "2", "22", "diesel", "bgfdg@gmail.com", "3213");
addCar("3" , "ford", "focus", "yellow", "1999", "7-seater", "2", "22", "petrol", "gfdgfd@gmail.com", "5435");
addCar("4" , "skoda", "fabia", "black", "2015", "coupe", "2", "22", "petrol", "gfdgfd@gmail.com", "54354");
addCar("5" , "toyota", "aygo", "white", "2013", "hatchback", "2", "22", "petrol", "gfdg@gmail.com", "5435");

//Display the usedCars Table

getAllCarsInDB();
?>