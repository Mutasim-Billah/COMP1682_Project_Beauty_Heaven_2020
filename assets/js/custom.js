jQuery( document ).ready(function( $ ) {


	"use strict";


		$('.product_slide').owlCarousel({
		    items:4,
		    loop:true,
		    dots:true,
		    margin:20,
		    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			        },
			        600:{
			            items:2,
			        },
			        1000:{
			            items:4,
			        }
			    }
		});

		$('.galarry').owlCarousel({
		    items:1,
		    lazyLoad:true,
		    loop:true,
		    dots:false,
		    margin:20,
		    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			        },
			        600:{
			            items:1,
			        },
			        1000:{
			            items:1,
			        }
			    }
		});

		/* activate jquery isotope */
		  var $container = $('.posts').isotope({
		    itemSelector : '.item',
		    isFitWidth: true
		  });

		  $(window).smartresize(function(){
		    $container.isotope({
		      columnWidth: '.col-sm-3'
		    });
		  });
		  
		  $container.isotope({ filter: '*' });

		    // filter items on button click
		  $('#filters').on( 'click', 'button', function() {
		    var filterValue = $(this).attr('data-filter');
		    $container.isotope({ filter: filterValue });
		});


		$('#carousel').flexslider({
		    animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    itemWidth: 210,
		    itemMargin: 5,
		    asNavFor: '#slider'
		});
		 
		$('#slider').flexslider({
		    animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    sync: "#carousel"
		});
 
});
