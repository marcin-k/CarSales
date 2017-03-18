<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 21/01/2017
 * Time: 19:49
 */
include "admin_db_operations.php";
echo "**************************************************</br>";
echo "*******-------------Adding few cars into db------------*******</br>";
echo "**************************************************</br>";
addCar("CARONE" , "opel", "corsa", "blue", "2016", "saloon", "2", "22", "petrol", "bgfg@gmail.com", "123", "7000", "XXX Description 
Description Description Description Description Description Description XXX");
addCar("CARTWO" , "bmw", "3", "red", "2004", "estate", "2", "22", "diesel", "bgfdg@gmail.com", "3213", "9000", "XXX Description 
Description Description Description Description Description Description XXX");
addCar("CARTHREE" , "ford", "focus", "yellow", "1999", "7-seater", "2", "22", "petrol", "gfdgfd@gmail.com", "5435", "17000", "XXX Description 
Description Description Description Description Description Description XXX");
addCar("CARFOUR" , "skoda", "fabia", "black", "2015", "coupe", "2", "22", "petrol", "gfdgfd@gmail.com", "54354", "7000", "XXX Description 
Description Description Description Description Description Description XXX");
addCar("CARFIVE" , "toyota", "aygo", "white", "2013", "hatchback", "2", "22", "petrol", "gfdg@gmail.com", "5435", "7000", "XXX Description 
Description Description Description Description Description Description XXX");

?>