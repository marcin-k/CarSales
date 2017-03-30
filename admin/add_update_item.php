<?php
    include 'inc/header.php';
    include "admin_db_operations.php";
?>
<!--GET HEADER-->

<?php

//is user is going to update
if(isset($_POST['updateDelete'])){
    //sets the values in the fields
    $id = $_POST['id'];
    $oldID = $_POST['id'];
    $make= getValue($id, 'manufacturer');
    $model=getValue($id, 'model');
    $year=  getValue($id, 'year');
    $doors= getValue($id, 'doors');
    $email = getValue($id, 'email');
    $phone = getValue($id, 'phone');
    $price = getValue($id, 'price');
    $doors =getValue($id, 'doors');
    $desc = getValue($id, 'description');
    $colour=getValue($id, 'colour');
    $cc=getValue($id, 'cc');
    $type=getValue($id, 'type');
    $fuel=getValue($id, 'fuel');
}
else{
    $id = "";
    $oldID = "";
    $make="";
    $model="";
    $year=  "";
    $doors= "";
    $email = "";
    $phone = "";
    $price = "";
    $doors ="";
    $desc = "";
    $colour="";
    $cc="";
    $type="";
    $fuel="";
}

//if user is not logged in but just entered the url redirect to login page
if(!isset($_POST['username'])) {
    header('Location: index.php');
}

//for logged-in users display the page
else {
    getForm(false, $id, $oldID, $make, $model, $year, $doors, $email,
        $phone, $price, $doors, $desc, $colour, $cc, $type, $fuel);
}
?>

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
