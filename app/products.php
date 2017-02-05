<?php 
	$title = 'Car Search Results';
	$description = 'Lorem Ipsum ...';
	include 'inc/header.php';
	include "db_operations.php";
?>
<!--GET HEADER-->

<!--MAIN START-->
<main>
	<section>
        <?php
        if(isset($_POST['type'])==false){
            echo "<h1>All cars in DB</h1>";
            getAllCarsInDB();
        }
        else{
            echo "<h1> ".$_POST['type']."</h1>";
            getSpecificType($_POST['type']);
        }

        ?>
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>