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

});
