<?php 
	// $title = FETCH (Car Model && Car Make) from DB
	// $description =  FETCH (Car Description) from DB
	include 'inc/header.php';
	include "db_operations.php";
?>
<!--GET HEADER-->

<!--MAIN START-->
<main>
	<section class="equal left">
        <?php
            if(isset($_GET['id'])==false){
                echo "<h1>Incorrect Car ID</h1>";
            }
            else{
                echo "<h1>Car Details:</h1>";
                getDetailsOfSpecificCar($_GET['id']);
            }
        ?>
	</section>

	<section class="equal right">
		
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>