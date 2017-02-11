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
	<section class="equal">
        <?php
            $id  = $_GET['id'];
            //checks if there is a image for a specific car
            if(file_exists("img/".$id.".jpg")){
                echo "<img src=\"img\\".$id.".jpg\">";
            }
            //displays a default car image if image was not found
            else{
                echo "<img src=\"img\\default.jpg\">";
            }
        ?>
	</section>

	<section class="equal">
    <?php
        if(isset($_GET['id'])==false){
            echo "<h1>Incorrect Car ID</h1>";
        }
        else{
            //echo "<h1>Car Details:</h1>";
            getDetailsOfSpecificCar($_GET['id']);
        }
    ?>


    <article>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Repellat modi quasi sunt nemo, nobis eum eveniet officia
        voluptatem inventore rerum. Temporibus autem minima,
        modi suscipit molestias sunt natus pariatur vero.
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Repellat modi quasi sunt nemo.
      </p>
    </article>
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
