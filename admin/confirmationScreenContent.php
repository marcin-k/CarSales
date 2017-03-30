<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 24/03/2017
 * Time: 23:55
 */


echo "
              <main>
                  <section class=\"full center widget\" >
                  <form  action ='index.php' method = \"post\" enctype = \"multipart/form-data\">
                    <input name='username' value=" . $_POST['username'] . " hidden>";

if (isset($_POST['updatePassword'])) {
    echo "<input name='pass' value=" . $_POST['pass2'] . " hidden>";
    updatePassword($_POST['username'], $_POST['pass2']);
    $updateStatus = updatePassword($_POST['username'], $_POST['pass2']);
    echo "<h3>" . $updateStatus . "</h3>";
} elseif (isset($_POST['newRecord'])) {
    echo "<input name='pass' value=" . $_POST['pass'] . " hidden>";
    //adds image file or creates a default image
    include 'uploadNewCarImage.php';
    //adds a new record to db
    addCar($id, $make, $model, $colour, $year, $type, $doors, $cc, $fuel, $email, $phone, $price, $desc);
} elseif (isset($_POST['updateDelete'])) {
    if ($_POST['updateDelete'] == 'update') {
        $updateStatus = update($oldID, $id, $make, $model, $colour, $year, $type, $doors, $cc,
            $fuel, $email, $phone, $price, $desc);
        echo "<h3>$updateStatus</h3>";
        echo "<input name='pass' value=" . $_POST['pass'] . " hidden>";

        include 'uploadUpdateExistingImage.php';
    } elseif ($_POST['updateDelete'] == 'delete') {
        $deleteMessagete = deleteCar($_POST['id']);
        //delete image
        $path = '../app/img/'.$_POST['id'].'.jpg';
        if (unlink($path)) {
            echo 'Old car image was deleted successfully';
        } else {
            echo 'Error - could not delete car image';
        }
        echo "<h3>$deleteMessagete</h3>";
        echo "<input name='pass' value=" . $_POST['pass'] . " hidden>";
    }
}

echo "        <button type = \"submit\" name='logged' value='false'> Back to Dashboard</button>
                  </form >
                  </section >
              </main>
              ";

?>