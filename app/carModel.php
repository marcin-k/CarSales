<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 10/02/2017
 * Time: 23:15
 */
include('db.php');
echo "hello";
if($_GET['id'])
{

    $id=$_GET['id'];
    $sql=mysql_query("SELECT distinct model FROM CarSales.UsedCars where manufacturer='$id'");

    while($row=mysql_fetch_array($sql))
    {
        $id=$row['model'];

        echo '<option value="'.$id.'">'.$id.'</option>';

    }
}

?>