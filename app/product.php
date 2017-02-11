<?php
	// $title = FETCH (Car Model && Car Make) from DB
	// $description =  FETCH (Car Description) from DB
  $title = 'product';
	$description =  'Lorem ipsum dolor sit amet';
  include 'inc/header.php';
	include "db_operations.php";
?>
<!--GET HEADER-->

<!--MAIN START-->
<main class="gallery">

        <?php
        echo "<section class=\"equal\">";
            $id  = $_GET['id'];
            //checks if there is a image for a specific car
            if(file_exists("img/".$id.".jpg")){
                echo "<img src=\"img\\".$id.".jpg\">";
            }
            //displays a default car image if image was not found
            else{
                echo "<img src=\"img\\default.jpg\">";
            }
        echo "</section>
	    <section class=\"equal\">";


        if(isset($_GET['id'])==false){
            echo "<h1>Incorrect Car ID</h1>";
        }
        else{
            //echo "<h1>Car Details:</h1>";
            getDetailsOfSpecificCar($_GET['id']);
        }

	echo "</section>";
	?>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
