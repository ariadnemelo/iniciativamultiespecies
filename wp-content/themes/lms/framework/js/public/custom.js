jQuery(document).ready(function($){
	
	var isMobile = (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ? true : false;
	var currentWidth = window.innerWidth || document.documentElement.clientWidth;
	
	if( mytheme_urls.isLandingPage == true) {	
	
		//ONE PAGE NAV...
		$('#main-menu').onePageNav({
			currentClass : 'current-menu-item',
			filter		 : ':not(.external)',
			scrollSpeed  : 750,
			scrollOffset : 50,
			scrollChange : fixMagicline
		});
		
	}

	$("body").on("click", ".reviews_tab a", function() {
		setTimeout(function() {
			$("html, body").getNiceScroll().resize();
		}, 100);
	});

	megaMenu();
	/*Menu */
	function megaMenu() {
		var screenWidth = $(document).width(),
		containerWidth = $("#header .container").width(),
		containerMinuScreen = (screenWidth - containerWidth)/2;
		if( containerWidth == screenWidth ){

			$px = mytheme_urls.scroll == "disable" ? 45 : 25;
			
			$("li.menu-item-megamenu-parent .megamenu-child-container").each(function(){

				var ParentLeftPosition = $(this).parent("li.menu-item-megamenu-parent").offset().left,
				MegaMenuChildContainerWidth = $(this).width();

				if( (ParentLeftPosition + MegaMenuChildContainerWidth) > screenWidth ){
					var SwMinuOffset = screenWidth - ParentLeftPosition;
					var marginFromLeft = MegaMenuChildContainerWidth - SwMinuOffset;
					var marginFromLeftActual = (marginFromLeft) + $px;
					var marginLeftFromScreen = "-"+marginFromLeftActual+"px";
					$(this).css('left',marginLeftFromScreen);
				}

			});
		} else {

			$px = mytheme_urls.scroll == "disable" ? 40 : 20;

			$("li.menu-item-megamenu-parent .megamenu-child-container").each(function(){
				var ParentLeftPosition = $(this).parent("li.menu-item-megamenu-parent").offset().left,
				MegaMenuChildContainerWidth = $(this).width();

				if( (ParentLeftPosition + MegaMenuChildContainerWidth) > containerWidth ){
					var marginFromLeft = ( ParentLeftPosition + MegaMenuChildContainerWidth ) - screenWidth;
					var marginLeftFromContainer = containerMinuScreen + marginFromLeft + $px;

					if( MegaMenuChildContainerWidth > containerWidth ){
						var MegaMinuContainer	= ( (MegaMenuChildContainerWidth - containerWidth)/2 ) + 10;
						var marginLeftFromContainerVal = marginLeftFromContainer - MegaMinuContainer;
						marginLeftFromContainerVal = "-"+marginLeftFromContainerVal+"px";
						$(this).css('left',marginLeftFromContainerVal);
					} else {
						marginLeftFromContainer = "-"+marginLeftFromContainer+"px";
						$(this).css('left',marginLeftFromContainer);
					}
				}

			});
		}
	}
	
	//Menu Hover Start
	function menuHover() {
		$("li.menu-item-depth-0,li.menu-item-simple-parent ul li" ).mouseenter(function(e) {
			//mouseover 
			if( $(this).find(".megamenu-child-container").length  ){
				$(this).find(".megamenu-child-container").stop().fadeIn('fast');
			} else {
				$(this).find("> ul.sub-menu").stop().fadeIn('fast');
			}
			e.preventDefault();
		}).mouseleave(function(e) {
			//mouseout
			if( $(this).find(".megamenu-child-container").length ){
				$(this).find(".megamenu-child-container").stop(true, true).hide();
			} else {
				$(this).find('> ul.sub-menu').stop(true, true).hide(); 
			}
			e.preventDefault();
		});
	}//Menu Hover End
	
	
	if( mytheme_urls.isLandingPage == true ) {
		if(mytheme_urls.landingpagestickynav === "enable") $("#header-wrapper").sticky({ topSpacing: 0 });
	} else if(mytheme_urls.stickynav === "enable" && !isMobile && currentWidth > 767) {
		$("#header-wrapper").sticky({ topSpacing: 0 });
	}

	//Menu Ends Here
	
	
	//create a stick nav
	if(!isMobile && currentWidth > 767) {
		var headerH = $('#header').height();
		$(document).on('ready scroll', function() {
			var docScroll = $(document).scrollTop();
			if(($('#header').hasClass('header1') || $('#header').hasClass('header2')) && docScroll >= headerH) {
				if (!$('#header').hasClass('header-animate')) {
					$('#header').addClass('header-animate').css({ top: '-155px' }).stop().animate({ top: 0 }, 500);
				}
			} else if(($('#header').hasClass('header3') || $('#header').hasClass('header4')) && docScroll >= headerH) {
				if (!$('#header').hasClass('header-animate')) {
					$('#header').addClass('header-animate').css({ top: '-255px' }).stop().animate({ top: 0 }, 500);
				}
			} else {
				$('#header').removeClass('header-animate').removeAttr('style');
			}
		});
	}
	

	if( currentWidth > 767 ) {
		if( $('#primary').hasClass('page-with-both-sidebar') ) {
			if( ( $('#secondary-left').is(':empty') && $('#secondary-right').is(':empty')) ){
				$('#primary').addClass("content-full-width").removeClass("page-with-sidebar page-with-both-sidebar");
			}else if( $('#secondary-left').is(':empty') ){
				$('#primary').addClass("with-right-sidebar").removeClass("page-with-both-sidebar");
			}else if( $('#secondary-right').is(':empty') ){
				$('#primary').addClass("with-left-sidebar").removeClass("page-with-both-sidebar");
			}
		} else if( $('#primary').hasClass('with-left-sidebar') ) {
			if( $('#secondary-left').is(':empty') ){
				$('#primary').addClass("content-full-width").removeClass("page-with-sidebar with-left-sidebar");
			}
		} else if( $('#primary').hasClass('with-right-sidebar') ) {
			if( $('#secondary-right').is(':empty') ){
				$('#primary').addClass("content-full-width").removeClass("page-with-sidebar with-right-sidebar");
			}
		}
	}
	
	if (mytheme_urls.nicescroll == "enable" && 
        	$(window).width() > 767 &&
        	! navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/) && ! navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ) {
            $("html").niceScroll({
                zindex: 999999,
                cursorborder: "1px solid #424242"
            });
        }

	//Menu
	if( mytheme_urls.isResponsive === "enable" ) {
		//Mobile Menu
		$("#dt-menu-toggle").on('click',function( event ){
			event.preventDefault();
			$menu = $("nav#main-menu").find("ul.menu:first");
			$menu.slideToggle(function(){
				$menu.css('overflow' , 'visible');
				$menu.toggleClass('menu-toggle-open');
			});
		});
	
		$(".dt-menu-expand").on('click',function(event){
			event.preventDefault();
			if( $(this).hasClass("dt-mean-clicked") ){
				$(this).text("+");
				if( $(this).prev('ul').length ) {
					$(this).prev('ul').slideUp(400);
				} else {
					$(this).prev('.megamenu-child-container').find('ul:first').slideUp(600);
				}
			} else {
				$(this).text("-");
				if( $(this).prev('ul').length ) {
					$(this).prev('ul').slideDown(400);
				} else{
					$(this).prev('.megamenu-child-container').find('ul:first').slideDown(2000);
				}
			}
			
			$(this).toggleClass("dt-mean-clicked");
			return false;
		});
	}
	
	/* To Top */
	$().UItoTop({ easingType: 'easeOutQuart' });

	/* Portfolio Lightbox */
	if($(".gallery").length) {
		$(".gallery a[data-gal^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false,social_tools: false,deeplinking:false});		
	}


	//Portfolio Single page Slider
	if( ($(".portfolio-slider").length) && ($(".portfolio-slider li").length > 1) ) {
		$('.portfolio-slider').bxSlider({ auto:false, video:true, useCSS:false, pager:'', autoHover:true, adaptiveHeight:true });
	}//Portfolio Single page Slider

    if( ($("ul.entry-gallery-post-slider").length) && ( $("ul.entry-gallery-post-slider li").length > 1 ) ){
	  	$("ul.entry-gallery-post-slider").bxSlider({auto:false, video:true, useCSS:false, pager:'', autoHover:true, adaptiveHeight:true});
    }	

	$('.wp-video').css('width', '100%');
	
	$("div.dt-video-wrap").fitVids();
	$("div.course-video").fitVids();
	$("div.lesson-video").fitVids();
	

	$("select").each(function(){
		if($(this).css('display') != 'none') {
			$(this).wrap( '<div class="selection-box"></div>' );
		}
	});
	
	//  Table Sorter
    if ($('.courses-table-list').length > 0) {
        $(".courses-table-list").tablesorter();
    }
    if ($('.lessons-table-list').length > 0) {
        $(".lessons-table-list").tablesorter();
    }
	
	
	if( !isMobile ){
		if( currentWidth > 767 ){
			menuHover();
		}
	}
  
	$(window).smartresize(function(){
		
		megaMenu();
		
		if( $(".apply-isotope").length ) {
			$(".apply-isotope").isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 20} });
		}
		
		//Mobile Menu
		if( !isMobile && (currentWidth > 767)  ){
			menuHover();
		}
		
	});
	
	if( $(".apply-isotope").length ) {
		$(".apply-isotope").isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 20} });
	}	
	
	/* Lessons Child */
	$('ol.dt-sc-lessons-list li ol li').has('ol').addClass('hassub');


	$(window).load(function() {

		$('#courses-type').val('all');
		$('#courses-category').val('all');
		$( ".course-layout.course-grid-type" ).trigger( "click" );
		
		//Portfolio isotope
		var $container = $('.dt-sc-portfolio-container');
		if( $container.length) {
			
			$width = $container.hasClass("no-space") ? 0 : 20;

			$(window).smartresize(function(){
				$container.css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutterWidth: $width } });
			});
			
			$container.isotope({
			  filter: '*',
			  masonry: { gutterWidth: $width },
			  animationOptions: { duration: 750, easing: 'linear', queue: false  }
			});
			
		}
		
		if($("div.dt-sc-sorting-container").length){
			$("div.dt-sc-sorting-container a").on('click',function(){
				$width = $container.hasClass("no-space") ? 0 : 20;				
				$("div.dt-sc-sorting-container a").removeClass("active-sort");
				var selector = $(this).attr('data-filter');
				$(this).addClass("active-sort");
				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: $width },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			return false;	
			});
		}
		//Portfolio isotope End
		
		$("ul.products li .product-wrapper").each(function(){
			var liHeight = $(this).height(); 
			$(this).css("height", liHeight);
	  	});

		//Blog
		if( $(".apply-isotope").length ){
			$(".apply-isotope").isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 20} });
		}//Blog
		
		setTimeout(function() {
			//Blog
			if( $(".apply-isotope").length ){
				$(".apply-isotope").isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 20} });
			}//Blog
		}, 600);
	
	});

	//Staff ajax load...	
	$("a[data-gal^='prettyPhoto[pp_gal]']").prettyPhoto({
		deeplinking: false,
		default_width: 930,
		default_height: 440,
		show_title: false,
		theme: 'light_square',
		ajaxcallback: function() {
			
				var pluginURL = mytheme_urls.pluginURL;
				$.getScript( pluginURL + "designthemes-core-features/shortcodes/js/shortcodes.js" );
				
				 $('.dt-sc-progress').each(function(){
					 var progressBar = jQuery(this),
						 progressValue = progressBar.find('.dt-sc-bar').attr('data-value');
						 
						if (!progressBar.hasClass('animated')) {
							progressBar.addClass('animated');
							progressBar.find('.dt-sc-bar').animate({
								width: progressValue + "%"
								},600,function(){ 
									progressBar.find('.dt-sc-bar-text').fadeIn(400);
							});
						}
				 });
			
			},
	});
	
	//Certificate ajax load...	

	$("a[data-gal^='prettyPhoto[certificate]']").each(function(){
	
		$('head').append('<style type="text/css">'+$(this).parent('td').find('.certificate_css').val()+'</style>');

		$(this).prettyPhoto({
			deeplinking: false,
			default_width: '1150px',
			default_height: '745px',
			show_title: false,
			theme: 'light_square',
		});

	});

	if($('#courses-search').length) {
		var availableTags = jQuery.parseJSON( jQuery('.course-title-holder').html() );
		var myAutocomplete = $('input#searchtext').autocomplete({
		    source: availableTags,
		    minLength: 1
		});		
	}
	
	//$(".entry-details .entry-meta a").find("span").remove();

	// Gutenberg - Fullwidth Section Fix
	$('.alignfull').each(function() {
		if($(this).parents('body').hasClass('has-gutenberg-blocks') && $(this).parents('#primary').hasClass('content-full-width')) {
			if($(this).parents('body').hasClass('layout-boxed')) {
				var containerWidth = $('.layout-boxed .wrapper').width();
				$(this).css('width', containerWidth);

				var mainLeft = $('#main').offset().left;
				var primaryLeft = $('#primary').offset().left;

				var sectionMargin = parseInt(primaryLeft, 10) - parseInt(mainLeft, 10);

				var offset = 0 - sectionMargin;
				$(this).css('left', offset);
			} else {

				var windowWidth = $(window).width();
				$(this).css('width', windowWidth);

				var $container = '';
				$container = $(this).parents('.content-full-width');

				var offset = 0 - $container.offset().left;
				$(this).css('left', offset);
			}
		}
	});

	// Gutenberg - WP Category Widget Fix
	if($('.wp-block-categories-list').length) {

		$('.wp-block-categories-list').find('li').each(function() {

			var span_text = $(this).find('span:first').html();
			$(this).find('span:first').remove()
			$('<span>'+span_text+'</span>').insertAfter($(this).find('a:first')); 
			
		});

	}

});

//CUSTOM FIX...
function fixMagicline() {
	
    var $magicLine = jQuery("#magic-line-two");
    
    var leftPos, newWidth;
	
	leftPos = jQuery(".current-menu-item a").position().left;
    newWidth = jQuery(".current-menu-item").width();
	
	$magicLine.stop().animate({
		left: leftPos,
		width: newWidth
	});
}

function funtoScroll(x, e) {
	
	"use strict";
	var et = String(e.target);
	var pos = et.indexOf('#');
	var t = et.substr(pos);

	if(pos > 0) {
		jQuery.scrollTo(t, 750, { offset: { top: -75 }});
	}
	else {
		window.location.href = et;
	}

	jQuery(x).parent('.mean-bar').next('.mean-push').remove();
	jQuery(x).parent('.mean-bar').remove();

	e.preventDefault();

}