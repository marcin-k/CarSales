<?php 
	$title = 'Home';
	$description = 'Lorem Ipsum ...';
	include 'inc/header.php'; 
?>
<!--GET HEADER-->

<!--MAIN START-->
<main>
	<section class="equal left">
		<form action="" class="search widget">
			<label for="carMake">Choose car make</label>
			<select name="" id="" class="carMake">
				<!--
				PHP LOOP GOES HERE
					Example : output
					<option value="ford">Ford</option>
					<option value="volkswagen">Volkswagen</option>
					etc ...
				-->
			</select>

			<label for="carModel">Choose car model</label>
			<select name="" id="" class="carModel">
				<!--
				PHP LOOP GOES HERE
					Example : output
					<option value="focus">Focus</option>
					<option value="golf">Golf</option>
					etc ...
				-->
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

			<button type="button">Submit</button>
			<span id="expand" class="right">More options</span>
		</form>
	</section>

	<section class="equal center">
			<button class="widget">
				<h3><a href="">Crossover</a></h3>
			</button>
			<button class="widget">
				<h3><a href="">Hatchback</a></h3>
			</button>
			<button class="widget">
				<h3><a href="">Saloon</a></h3>
			</button>
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>