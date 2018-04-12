jQuery(document).ready(function ($) {
	  $('.readmore').click(function(e) {
	  	  	console.log("hej")
	  	  	readmore();
	  });
	  window.addEventListener('scroll', fixedMenu);
	var headerHeight = $(".main-header").height()
	  function fixedMenu (e) {
	  	if(window.scrollY > headerHeight){
	  		$('#topMeny')[0].classList.add("fixed");
	  		window.removeEventListener('scroll', fixedMenu);
	  		window.addEventListener('scroll', staticMenu);
	  	}
	  }
	  function staticMenu(e) {
		var headerHeight = $(".main-header").height()
	  	//if($( "body" ).hasClass( "home" )){

	  	if(window.scrollY < headerHeight){
	  		$('#topMeny')[0].classList.remove("fixed");
			window.addEventListener('scroll', fixedMenu);
	  	}
	  }
	});
