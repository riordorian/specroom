/*global jQuery:false */
jQuery(document).ready(function($) {
"use strict";


	(function() {

		var $menu = $('.navigation nav'),
			optionsList = '<option value="" selected>Перейти..</option>';

		$menu.find('li').each(function() {
			var $this   = $(this),
				$anchor = $this.children('a'),
				depth   = $this.parents('ul').length - 1,
				indent  = '';

			if( depth ) {
				while( depth > 0 ) {
					indent += ' - ';
					depth--;
				}

			}
			$(".nav li").parent().addClass("bold");

			optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
		}).end()
		.after('<select class="selectmenu">' + optionsList + '</select>');
		
		$('select.selectmenu').on('change', function() {
			window.location = $(this).val();
		});
		
	})();

	
		  $('.toggle-link').each(function() {
			$(this).click(function() {
			  var state = 'open'; //assume target is closed & needs opening
			  var target = $(this).attr('data-target');
			  var targetState = $(this).attr('data-target-state');
			  
			  //allows trigger link to say target is open & should be closed
			  if (typeof targetState !== 'undefined' && targetState !== false) {
				state = targetState;
			  }
			  
			  if (state == 'undefined') {
				state = 'open';
			  }
			  
			  $(target).toggleClass('toggle-link-'+ state);
			  $(this).toggleClass(state);      
			});
		  });
	
		//add some elements with animate effect

		$(".big-cta").hover(
			function () {
			$('.cta a').addClass("animated shake");
			},
			function () {
			$('.cta a').removeClass("animated shake");
			}
		);
		$(".box").hover(
			function () {
			$(this).find('.icon').addClass("animated pulse");
			$(this).find('.text').addClass("animated fadeInUp");
			$(this).find('.image').addClass("animated fadeInDown");
			},
			function () {
			$(this).find('.icon').removeClass("animated pulse");
			$(this).find('.text').removeClass("animated fadeInUp");
			$(this).find('.image').removeClass("animated fadeInDown");
			}
		);
		
		
		$('.accordion').on('show', function (e) {
		
			$(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
			$(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-plus');
			$(e.target).prev('.accordion-heading').find('.accordion-toggle i').addClass('icon-minus');
		});
		
		$('.accordion').on('hide', function (e) {
			$(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
			$(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-minus');
			$(this).find('.accordion-toggle i').not($(e.target)).addClass('icon-plus');
		});
        $('.accordion-vacancy').on('show', function (e) {

			$(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
			$(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-arrow-down').addClass('icon-arrow-up');
		});

		$('.accordion-vacancy').on('hide', function (e) {
			$(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
			$(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-arrow-up').addClass('icon-arrow-down');
		});


		
		//Navi hover
		$('ul.nav li.dropdown').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
		});
		
		// tooltip
		$('.social-network li a, .options_box .color a').tooltip();

		// fancybox
		$(".fancybox").fancybox({				
				padding : 0,
				autoResize: true,
				beforeShow: function () {
					this.title = $(this.element).attr('title');
					this.title = '<h4>' + this.title + '</h4>' + '<p>' + $(this.element).parent().find('img').attr('alt') + '</p>';
				},
				helpers : {
					title : { type: 'inside' },
				}
			});

		
		//scroll to top
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();
				} else {
				$('.scrollup').fadeOut();
			}
		});
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
		});

		$('#mycarousel').jcarousel();
		$('#mycarousel1').jcarousel();
		//nivo slider
		$('.nivo-slider').nivoSlider({
			effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
			slices: 15, // For slice animations
			boxCols: 8, // For box animations
			boxRows: 4, // For box animations
			animSpeed: 500, // Slide transition speed
			pauseTime: 5000, // How long each slide will show
			startSlide: 0, // Set starting Slide (0 index)
			directionNav: true, // Next & Prev navigation
			controlNav: true, // 1,2,3... navigation
			controlNavThumbs: false, // Use thumbnails for Control Nav
			pauseOnHover: true, // Stop animation while hovering
			manualAdvance: false, // Force manual transitions
			prevText: '', // Prev directionNav text
			nextText: '', // Next directionNav text
			randomStart: false, // Start on a random slide
			beforeChange: function(){}, // Triggers before a slide transition
			afterChange: function(){}, // Triggers after a slide transition
			slideshowEnd: function(){}, // Triggers after all slides have been shown
			lastSlide: function(){}, // Triggers when last slide is shown
			afterLoad: function(){} // Triggers when slider has loaded
		});
		/*
		var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
		// call the plugin's add method
		ss.add($items);
		*/
		$('.flexslider').flexslider({
            prevText: "<i class='icon-angle-left'></i>",
            nextText: "<i class='icon-angle-right'></i>"
        });

});