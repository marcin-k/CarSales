<?php
	$title = 'Contact';
	$description = 'Lorem Ipsum ...';
	include 'inc/header.php';
?>
<!--GET HEADER-->

<!--MAIN START-->
<main class="contact">
  
	<section class="equal">

	</section>

	<section class="equal">

			<!-- Header -->
			<div class="template-component-header-subheader template-align-left">
				<h4>Leave a messsage</h4>
				<div></div>
			</div>

			<!-- Text -->
			<p class="template-padding-reset">
				Etiam ullamcorper est terminal metro. Suspendisse a novum etos pellentesque a non felis maecenas malesuada primus elit lectus.
			</p>

			<!-- Space -->
			<div class="template-component-space template-component-space-2"></div>

			<!-- Contact form -->
			<form name="contact-form" id="contact-form" method="POST" action="#" class="noPadMarg">

  			<label for="contact-form-name">Your Name *</label>
  			<input type="text" name="contact-form-name" id="contact-form-name">

				<label for="contact-form-email">Your E-mail *</label>
				<input type="text" name="contact-form-email" id="contact-form-email">

				<label for="contact-form-phone">Phone Number</label>
				<input type="text" name="contact-form-phone" id="contact-form-phone">

				<label for="contact-form-message">Message *</label>
				<textarea rows="1" cols="1" name="contact-form-message" id="contact-form-message"></textarea>
        <br>
			  <input type="submit" value="Submit Message" class="template-component-button" name="contact-form-submit" id="contact-form-submit">
		  </form>

	</section>
</main>
<!--MAIN END-->

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>
