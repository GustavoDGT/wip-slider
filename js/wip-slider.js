jQuery(document).ready(function($) {
	$('#left-hero').on('mouseover', function(event) {
		event.preventDefault();
		$(this).addClass('left-hero-expanded');
		$(this).children('.left-hero-tilt').addClass('left-hero-tilt-expanded');
		$(this).find('.initial').removeClass('active');
		$(this).find('.expanded').addClass('active');
		$('#right-hero').addClass('right-hero-collapsed');
		$('#right-hero').children('.right-hero-tilt').addClass('right-hero-tilt-collapsed');
		$('#right-hero').find('.initial').removeClass('active');
		$('#right-hero').find('.collapsed').addClass('active');
	});

	$('#left-hero').on('mouseout', function(event) {
		event.preventDefault();
		$(this).removeClass('left-hero-expanded');
		$(this).children('.left-hero-tilt').removeClass('left-hero-tilt-expanded');
		$(this).find('.expanded').removeClass('active');
		$(this).find('.initial').addClass('active');
		$('#right-hero').removeClass('right-hero-collapsed');
		$('#right-hero').children('.right-hero-tilt').removeClass('right-hero-tilt-collapsed');
		$('#right-hero').find('.collapsed').removeClass('active');
		$('#right-hero').find('.initial').addClass('active');
	});

	$('#right-hero').on('mouseover', function(event) {
		event.preventDefault();
		$(this).addClass('right-hero-expanded');
		$(this).children('.right-hero-tilt').addClass('right-hero-tilt-expanded');
		$(this).find('.initial').removeClass('active');
		$(this).find('.expanded').addClass('active');
		$('#left-hero').addClass('left-hero-collapsed');
		$('#left-hero').children('.left-hero-tilt').addClass('left-hero-tilt-collapsed');
		$('#left-hero').find('.initial').removeClass('active');
		$('#left-hero').find('.collapsed').addClass('active');
	});

	$('#right-hero').on('mouseout', function(event) {
		event.preventDefault();
		$(this).removeClass('right-hero-expanded');
		$(this).children('.right-hero-tilt').removeClass('right-hero-tilt-expanded');
		$(this).find('.expanded').removeClass('active');
		$(this).find('.initial').addClass('active');
		$('#left-hero').removeClass('left-hero-collapsed');
		$('#left-hero').children('.left-hero-tilt').removeClass('left-hero-tilt-collapsed');
		$('#left-hero').find('.collapsed').removeClass('active');
		$('#left-hero').find('.initial').addClass('active');
	});
	/*
	$('.owl-carousel').owlCarousel({
		animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    mouseDrag:false,
	  items:1,
	  lazyLoad:true,
	  rewind:true,
	  autoplay:true,
    autoplayTimeout:4000,
    nav:true,
    navText: [
	   "<i class='fa fa-angle-left fa-4x'></i>",
	   "<i class='fa fa-angle-right fa-4x'></i>"
		],
		dots:false,
		
		onChanged: function(event) {
			var item = event.item.index;
			if (item%2 != 0) {
				$('.text-caption').removeClass('animated slideInLeft');
				$('.owl-carousel .owl-item').eq(item).find('.text-caption').addClass('animated slideInLeft');
			} else {	
				$('.text-caption').removeClass('animated slideInRight');
				$('.owl-carousel .owl-item').eq(item).find('.text-caption').addClass('animated slideInRight');
			}
			
		}
	});
	$('.slider-home').click(function(e) {
		$('html,body').animate({scrollTop: $("#section-1").offset().top - 80},'slow');    
	}); */
});