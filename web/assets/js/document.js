jQuery(document).ready(function($) {
	$("#header-slider").owlCarousel({
    	autoPlay: 5000, //Set AutoPlay to 3 seconds
 		slideSpeed: 1000,
      	items : 1,
      	itemsDesktop : [1920,1]
	});

	$("#packs-slider").owlCarousel({
		items : 3,
		itemsDesktop : [1920,3]
	});
});