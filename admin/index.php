<?php include 'inc/header.php'; ?>
<!--GET HEADER-->

<main>
	<section>
		<form action="upload.php" method="post" enctype="multipart/form-data">
	 		<input type="file" name="fileToUpload" id="fileToUpload">
	 		<input type="submit" value="Upload Image" name="submit">
		</form>
	</section>
</main>

<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>