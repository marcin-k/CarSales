$(document).ready(function () {

	$(".menu a").click(function() {
      $("header").toggleClass("open")
   })

	 $("nav li a, .logo a, main").click(function() {
      return $("header").removeClass("open")
   })

	$('#expand').click(function(){
			$('#expanded').slideToggle();
      var expandTxt = $(this).text();
      if(expandTxt == 'Refine search') {
        $('#expand').text('Hide search')
      }
      else if(expandTxt == 'Hide search') {
        $('#expand').text('Refine search')
      }
      else if(expandTxt == 'More options') {
        $('#expand').text('Less options')
      }
      else {
        $('#expand').text('More options')
      }
	})

  $('h1').addClass('fadeInUp animated')

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
          file.name = 'test.jpg'
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

});
