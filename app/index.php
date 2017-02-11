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
		<form action="products.php" class="search widget" method="post">
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
            <select name="make" id="model" class="carMake">
                <option selected="selected">--Select Make--</option>
                <?php
                    include('db.php');
                    $sql=mysql_query("SELECT distinct manufacturer FROM UsedCars");
                    while($row=mysql_fetch_array($sql))
                    {
                        $id=$row['manufacturer'];
                        echo '<option value="'.$id.'">'.$id.'</option>';
                    }
                ?>
            </select> <br/><br/>
            <label for="carModel">Choose car model</label>
            <select name="model" id="model" class="carModel">
                <option selected="selected">--Select Model--</option>
            </select>

			<div id="expanded">
				<label for="minYear">Min Year</label>
				<select name="minYear" id="minYear">
                    <option selected="selected">--min year--</option>
                    <?php for($i = 1999; $i < 2016; $i++){ echo "<option>$i</option>";} ?>
                </select>
				<label for="maxYear">Max Year</label>
				<select name="maxYear" id="maxYear">
                    <option selected="selected">--max year--</option>
                    <?php for($i = 1999; $i < 2016; $i++){ echo "<option>$i</option>";} ?>
                </select>
				<label for="">Max Price</label>
				<input type="range" name="maxPrice" id="slider" min="1000" value="50000" max="50000" step="1000">
			</div>

			<br/>
			<button type="submit">Submit</button>
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
