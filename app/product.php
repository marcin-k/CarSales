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
    <ol>
      <li class="full">
        <img src="http://placehold.it/600x460">
      </li>
      <li class="small">
        <img src="http://placehold.it/600x460">
      </li>
      <li class="small">
        <img src="http://placehold.it/600x460">
      </li>
      <li class="small">
        <img src="http://placehold.it/600x460">
      </li>
    </ol>
	</section>

	<section class="equal">
    <?php
        if(isset($_GET['id'])==false){
            echo "<h1>Incorrect Car ID</h1>";
        }
        else{
            echo "<h1>Car Details:</h1>";
            getDetailsOfSpecificCar($_GET['id']);
        }
    ?>
    <ul class="statistics equal center">
	    <li>test</li>
	    <li>test</li>
	    <li>test</li>
	    <li>test</li>
	  </ul>

    <ul class="statistics equal center">
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
    </ul>

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
