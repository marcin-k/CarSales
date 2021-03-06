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
        //-----------------------------------------------------------------------------------------
        //TODO: move css outside this file, change the styling so the buttons align next to one another
        echo "
        <form action=\"products.php\" method=\"post\">

           <input name=\"make\" value='".getModelOrMakeBasedOnID($_GET['id'], 'manufacturer')."' hidden>
           <input name=\"model\" value='".getModelOrMakeBasedOnID($_GET['id'], 'model')."' hidden>
           <input name=\"minYear\" value=\"--min year--\" hidden>
           <input name=\"maxYear\" id=\"make\" class=\"carMake\" value=\"--max year--\" hidden>
           <input name=\"maxPrice\" value=\"50000\" hidden>
          <div style=\"margin-top:-26px;padding-bottom:7px;\">
            >&nbsp;
            <a ><button class=\"breadcrumbs\" type=\"submit\" value='make'>".getModelOrMakeBasedOnID($_GET['id'], 'manufacturer')."</button></a>&nbsp;>&nbsp;



            <a><button class=\"breadcrumbs\"  type=\"submit\" class='equal' value='model'>".getModelOrMakeBasedOnID($_GET['id'], 'model')."</button></a>
          </div>

        </form>
        ";
        //-----------------------------------------------------------------------------------------


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
