<?php 
	$title = 'Home';
	$description = 'Lorem Ipsum ...';
	include 'inc/header.php'; 
?>
<!--GET HEADER-->

<!--MAIN START-->
<main>
	<section class="equal left">

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
		<span id="expand">More options</span>
		
	</section>

	<section class="equal center">
		<div class="featured1">
			<h3><a href="">Crossover</a></h3>
		</div>
		<div class="featured2">
			<h3><a href="">Hatchback</a></h3>
		</div>
		<div class="featured3">
			<h3><a href="">Saloon</a></h3>
		</div>
	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>