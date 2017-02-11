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
        //if user selects the type of car (right side menu on index page)
        if(isset($_POST['type'])==true){
            echo "<h1> ".$_POST['type']."</h1>";
            getSpecificType($_POST['type']);
        }

        //If users selects only make and model(model is automatically selected once make is picked)
        elseif(($_POST['make']!=="--Select Make--")&&($_POST['minYear']=="--min year--")&&($_POST['maxYear']=="--max year--")){
            echo "<h1>TEST q for make and model + max price </h1>";
            getMakeModelMaxPrice($_POST['make'],$_POST['model'],$_POST['maxPrice']);
        }

        //If user selects only min year
        elseif(($_POST['make']=="--Select Make--")&&($_POST['minYear']!=="--min year--")&&($_POST['maxYear']=="--max year--")){
            echo "<h1>TEST q for min year + max price </h1>";
            getMinYearMaxPrice($_POST['minYear'],$_POST['maxPrice']);
        }

        //If users selects only max year
        elseif(($_POST['make']=="--Select Make--")&&($_POST['minYear']=="--min year--")&&($_POST['maxYear']!=="--max year--")){
            echo "<h1>TEST q for max year + max price </h1>";
            getMaxYearMaxPrice($_POST['maxYear'],$_POST['maxPrice']);
        }

        //If user selects make and model and min year (but not max year)
        elseif(($_POST['make']!=="--Select Make--")&&($_POST['minYear']!=="--min year--")&&($_POST['maxYear']=="--max year--")){
            echo "<h1>TEST q for make, model, min year + max price </h1>";
            getMakeModelMinYearMaxPrice($_POST['make'],$_POST['model'],$_POST['minYear'],$_POST['maxPrice']);
        }

        //If user selects make and model and max year (but not min year)
        elseif(($_POST['make']!=="--Select Make--")&&($_POST['minYear']=="--min year--")&&($_POST['maxYear']!=="--max year--")){
            echo "<h1>TEST q for make, model, max year + max price </h1>";
            getMakeModelMaxPrice($_POST['make'],$_POST['model'],$_POST['maxPrice']);
        }

        //If user selects min year, max year (but not make and model)
        elseif(($_POST['make']=="--Select Make--")&&($_POST['minYear']!=="--min year--")&&($_POST['maxYear']!=="--max year--")){
            echo "<h1>TEST q for min year,  max year + max price </h1>";
            getMinYearMaxYearMaxPrice($_POST['minYear'],$_POST['maxYear'],$_POST['maxPrice']);
        }

        //If user selects all fields
        elseif(($_POST['make']!=="--Select Make--")&&($_POST['minYear']!=="--min year--")&&($_POST['maxYear']!=="--max year--")){
            echo "<h1>TEST q make and model, min year, max year + max price </h1>";
            getMakeModelMinYearMaxYearMaxPrice($_POST['make'],$_POST['model'],$_POST['minYear'],$_POST['maxPrice'],$_POST['maxPrice']);
        }

        //if user just use the url or clicks the submit button without filling any fields
        else{
            echo "<h1>All cars in DB</h1>";
            getAllCarsInDB();
        }
    ?>
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>