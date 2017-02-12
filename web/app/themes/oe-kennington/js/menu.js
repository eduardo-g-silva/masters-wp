$( document ).ready(function() {

	$(".dropdown-toggle").click(function(){
		$(this).siblings(".dropdown-menu").toggle;
		$(this).siblings(".dropdown-menu").css("position","relative");
		$(this).siblings(".dropdown-menu").css("z-index","10");
	});

}); // /document.ready 
