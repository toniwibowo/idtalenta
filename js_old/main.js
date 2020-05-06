jQuery(document).ready(function($){
	$('.imgfill').imagefill();
	$(function() {
		$('.owl-001').matchHeight({
	        target: $('.comp-profile-text')
	    });
	});

	var checkWidth = $(window).width();
	var checkHeight = $(window).height();

	console.log('width:'+ checkWidth);
	console.log('height:'+ checkHeight);

	$(".owl-carousel").owlCarousel({
		items: 1,
		mergeFit: true,
		center: true,
		loop: true,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true
	});
	$('.mobile-trigger').click(function(){
		$('.header-mobile .menu').toggleClass('active');
	});
	$('.mapbtn').click(function(e){
		e.preventDefault();
		if ($(this).is(":not(.active)")){
			$('#gmap-display iframe').attr('src', $(this).data('map'));
		}
		$('.mapbtn').removeClass('active');
		$(this).addClass('active');
	});

	$('.btn-search').click(function(){
		$('.box-search').toggle('slow');
	});

	var wHeight = ($(window).height() - 64);
	var halfWidth = ($(window).width() / 2);

	//$('.main-hero .owl-carousel .owl-item').css('height',+ wHeight);

	$('.half').css('width',+ halfWidth);

	// $('.product-slider').bxSlider({
	// 	auto:true
	// });

	if (checkWidth > 768) {
		$(window).scroll(function(){
			if ($(window).scrollTop() > 300) {
				$('.logo-box .big-logo').hide('slow');
				$('.logo-box .d-none').addClass('small-logo');
				$('.logo-box .small-logo').removeClass('d-none');
			}else{
				$('.logo-box .big-logo').show();
				$('.logo-box .small-logo').addClass('d-none');
				$('.logo-box d-none').removeClass('small-logo');
			}
		})
	}

	if (checkWidth < 768 ) {
		$('.main-hero .owl-carousel .owl-item').css('height','auto');
		$('.mainmenu').slicknav({
			prependTo:'.header-mobile'
		});
	}

});
