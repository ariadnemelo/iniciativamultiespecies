$(function() {
	'use strict';

	var width = $(window).width();
	var height = $(window).height();

	// Preloader.
	$(window).on('load', function() {
		$(".preloader .spinner").fadeOut(function() {
			$('.preloader').fadeOut();
			$('body').addClass('ready');
		});
	});

	// Side navigation.
	$('.menu-btn').sideNav();
	if (width < 1080) {
		$('.side-nav').css({
			'transform' : 'translateX(-100%)'
		});
	}

	// Side nav menu scroll.
	if ($('#home-section').length) {
		$(window).on('scroll', function() {
			var scrollPos = $(window).scrollTop();
			$('.side-nav li > a').each(function() {
				var currLink = $(this);
				var refElement = $(currLink.attr("href"));
				if (refElement.offset().top - 30 <= scrollPos) {
					$('.side-nav li').removeClass("active");
					currLink.closest('li').addClass("active");
				}
			});
		});
	}

	$('.scrollspy').scrollSpy({
		scrollOffset : 0
	});
});

