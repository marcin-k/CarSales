<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 10/02/2017
 * Time: 23:17
 */

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "CarSales";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>