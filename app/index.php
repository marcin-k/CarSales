<?php
	$title = 'Home';
	$description = 'Lorem Ipsum ...';
	include 'inc/header.php';
    include "db_operations.php";
?>
<!--GET HEADER-->

<!--MAIN START-->

<main id="hero">
  <div class="wrap">

	<h1 class="center light">Find your preloved car</h1>
	<section class="full">
		<form action="products.php" class="equal left search widget" method="post">
            <script type="text/javascript" src="jQueryJavaScriptLibrary.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".carMake").change(function() {
                        var id=$(this).val();
                        var dataString = 'id='+ id;

                        $.ajax({
                            type: "GET",
                            url: "carModel.php",
                            data: dataString,
                            cache: false,
                            success: function(html)
                            {
                                $(".carModel").html(html);
                            }
                        });
                    });
                });
            </script>
            <label for="carMake">Choose car make</label>
            <select name="make" id="make" class="carMake">
                <option selected="selected">--Select Make--</option>
                <?php getMakeDropDownSelection(); ?>
            </select>
            <label for="carModel">Choose car model</label>
            <select name="model" id="model" class="carModel">
                <option selected="selected">--Select Model--</option>
            </select>

			<div id="expanded">
        <div class="equal">
  				<label for="minYear">Min Year</label>
  				<select name="minYear" id="minYear">
              <option selected="selected">--min year--</option>
              <?php for($i = 1999; $i < 2016; $i++){ echo "<option>$i</option>";} ?>
          </select>
        </div>
        <div class="equal">
  				<label for="maxYear">Max Year</label>
  				<select name="maxYear" id="maxYear">
            <option selected="selected">--max year--</option>
            <?php for($i = 1999; $i < 2016; $i++){ echo "<option>$i</option>";} ?>
          </select>
        </div>

  				<label for="">Max Price</label>
  				<input type="range" name="maxPrice" id="slider" min="1000" value="50000" max="50000" step="1000" onchange="showValue(this.value)" />
          <!-- <input type="text" id="rangeTxt" value="" /> -->
		</div>

		<br/>
		<button type="submit">Submit</button>
		<label id="expand" class="right">More options</label>

		</form>

    <?php getTopThree(); ?>
	</section>
</div>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
