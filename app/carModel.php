<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 10/02/2017
 * Time: 23:15
 */
include('db_operations.php');
if($_GET['id']) {
    $id=$_GET['id'];
    getModelDropDownSelection($id);
}
?>