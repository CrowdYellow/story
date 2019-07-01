$(function(){
	'use-strict';

	// side nav left
	$(".side-nav-left").sideNav({

		edge: 'left',
		closeOnClick: false

	});
	$('.side-nav-right').click(function (e) {
		e.preventDefault();
		$('.side-nav-right .fa ').toggleClass('fa-close');
		$('.searBox').toggleClass('on');
	});
	
	$('.search_sub').click(function () {
		$('#searchForm').submit();
	})
	// slider
	$(".slider").slider({full_width: true});

	// testimonial
	$("#owl-testimonial").owlCarousel({

		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true

	})

	// latest-news
	$(".latest-news-owl").owlCarousel({

		autoPlay : false,
		singleItem: true

	})

	// loader
    $("#fakeLoader").fakeLoader({
      
      zIndex: 999,
      spinner: 'spinner1',
      bgColor: '#ffffff'

    });

    $('.collapsible').collapsible({
		accordion: false
	});

});