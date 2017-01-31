$(document).ready(function () {
   
	$(".menu a").click(function() {
      $("header").toggleClass("open")
   })
   
	 $("nav li a, .logo a, main").click(function() {
      return $("header").removeClass("open")
   })

	$('#expand').click(function(){
			$('#expanded').toggle();
	})

});