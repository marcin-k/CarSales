<?php
    include 'inc/header.php';
    include "admin_db_operations.php";


//<!--GET HEADER-->
//if user is not logged in but just entered the url redirect to login page
if(!isset($_POST['username'])) {
    header('Location: index.php');
}
else{
    echo "
        <main>
          <section>
            <h3>List of all Cars</h3>
            <ul class=\"editForm\">";
              // Below html is defined in admin_db_operations.php in lines 118 to 132
              displayListOfCars();
    echo "  </ul>
          </section>
        </main>";
}

//<!--GET FOOTER-->
include 'inc/footer.php';
?>
