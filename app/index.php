<?php
	$title = 'Home';
	$description = 'Lorem Ipsum ...';
	include 'inc/header.php';
    include "db_operations.php";
?>
<!--GET HEADER-->

<!--MAIN START-->
<main>
	<h1 class="center">Find your preloved car</h1>
	<section class="equal left">
		<form action="" class="search widget">
			<label for="carMake">Choose car make</label>
			<select name="" id="make" class="carMake">
                <?php getAllMakes(); ?>
			</select>

			<label for="carModel">Choose car model</label>
			<select name="" id="" class="carModel">
                <?php
                    //to be added
                ?>

			</select>


			<!--Toggle using js-->
			<div id="expanded">
				<label for="minYear">Min Year</label>
				<select name="" id="minYear"></select>
				<label for="maxYear">Max Year</label>
				<select name="" id="maxYear"></select>
				<label for="">Price Range</label>
				<input type="range" id="slider" min="100" value="1000" max="50000" step="100">
			</div>
			<br/>
			<button type="button">Submit</button>
			<span id="expand" class="right">More options</span>
		</form>
	</section>

	<section class="feature equal center">
      <?php getTopThree(); ?>
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
