<?php include 'inc/header.php'; ?>
<!--GET HEADER-->
//test
<main>
	<section>
		<form action="upload.php" method="post" enctype="multipart/form-data">
	 		<input type="file" name="fileToUpload" id="fileToUpload">
	 		<input type="submit" value="Upload Image" name="submit">
		</form>
	</section>
</main>


<script>
		var holder = document.getElementById('holder'),
				tests = {
						filereader: typeof FileReader != 'undefined',
						dnd: 'draggable' in document.createElement('span'),
						formdata: !!window.FormData,
				},
				acceptedTypes = {
						'image/png': true,
						'image/jpeg': true,
						'image/gif': true
				},
				fileupload = document.getElementById('upload');

		function previewfile(file) {
				if (tests.filereader === true && acceptedTypes[file.type] === true) {
						var reader = new FileReader();
						reader.onload = function (event) {
								var image = new Image();
								image.src = event.target.result;
								image.width = 250; // a fake resize
								holder.appendChild(image);
						};

						reader.readAsDataURL(file);
				}  else {
						holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
						console.log(file);
				}
		}

		function readfiles(files) {
				debugger;
				var formData = tests.formdata ? new FormData() : null;
				for (var i = 0; i < files.length; i++) {
						if (tests.formdata) formData.append('file', files[i]);
						previewfile(files[i]);
				}
		}

		if (tests.dnd) {
				holder.ondragover = function () { this.className = 'hover'; return false; };
				holder.ondragend = function () { this.className = ''; return false; };
				holder.ondrop = function (e) {
						this.className = '';
						e.preventDefault();
						readfiles(e.dataTransfer.files);
				}
		} else {
				fileupload.className = 'hidden';
				fileupload.querySelector('input').onchange = function () {
						readfiles(this.files);
				};
		}
</script>
<!--GET FOOTER-->
<?php include 'inc/footer.php'; ?>