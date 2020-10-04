
$(document).ready(function(){

	$('.speaker-slider').owlCarousel({
        loop:true,
        margin:40,
		nav:false,
		items:1,
		dots: true
	});
	
	$('.webinars-slider').owlCarousel({
        loop:true,
        margin:30,
		nav:false,
		dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
 
});






 

