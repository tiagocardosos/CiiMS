jQuery(document).ready(function($) {
	/*Image hover*/
	$('.proj-img').hover(function() {
		$(this).find('i').stop().animate({
			opacity: 0.9
		}, 'fast');
		$(this).find('a').stop().animate({
			"top": "50%"
		});
	}, function() {
		$(this).find('i').stop().animate({
			opacity: 0
		}, 'fast');
		$(this).find('a').stop().animate({
			"top": "-30px"
		});
	}); /*Dropdown menu script */
	$(".navmenu li").has("ul").hover(function() {
		$(this).children("ul").stop(true, true).slideDown(150);
	}, function() {
		$(this).children("ul").slideUp(100);
	}); /*jPreloader*/
	$(".proj-img, .proj-img1").preloader(); /*Post-mod*/

 /*Cufon*/
	Cufon.replace("h1, h2, h3, h4, h5, .posts .col1-12 span", {
		fontFamily: 'Nadia Serif'
	}); /*Nivo slider*/
	$('#slider').nivoSlider({
		effect: "random",
		slices: 15,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 3e3,
		startSlide: 0,
		directionNav: true,
		directionNavHide: true,
		controlNav: true,
		keyboardNav: true,
		pauseOnHover: true,
		captionOpacity: 1
	});
	$('#head').nivoSlider({
		effect: "fold",
		animSpeed: 500,
		pauseTime: 7e3,
		startSlide: 0,
		directionNav: false,
		controlNav: false,
		keyboardNav: false,
		pauseOnHover: false
	});
	$('.portfolio-slider').nivoSlider({
		effect: "fade",
		animSpeed: 500,
		startSlide: 0,
		directionNav: true,
		directionNavHide: true,
		controlNav: true,
		keyboardNav: true,
		pauseOnHover: true,
		manualAdvance: true
	}); /*prettyPhoto*/
	$("a[class^='prettyPhoto']").prettyPhoto({
		theme: 'light_rounded'
	}); /*tipSwift*/
	$('.totop, .social li a').tipSwift({
		gravity: $.tipSwift.gravity.autoWE,
		live: true,
		plugins: [$.tipSwift.plugins.tip({
			offset: 8,
			gravity: 's',
			opacity: 1
		})]
	}); /*jFlickr*/
	$('#jflickr').jFlickr({
		pictures: 4,
		flickrId: '58842866@N08',
		tags: 'interiors',
		grabSize: 'auto',
		width: 100,
		height: 80
	}); /*jTweet*/
	$(".tweet").tweet({
		count: 3,
		username: ["envato"],
		loading_text: "Loading tweets...",
		refresh_interval: 60
	}); /*jFlow - content slider*/
	$("#myController").jFlow({
		slides: "#slides",
		controller: ".jFlowControl",
		// must be class, use . sign
		slideWrapper: "#jFlowSlide",
		// must be id, use # sign
		selectedWrapper: "jFlowSelected",
		// just pure text, no sign
		auto: false,
		//auto change slide, default true
		width: "620px",
		duration: 600,
		easing: "easeOutQuint",
		prev: ".jFlowPrev",
		// must be class, use . sign
		next: ".jFlowNext" // must be class, use . sign
	}); /*jQuery tabs*/
	$('.tabs').tabs({
		fx: {
			opacity: 'show'
		}
	}); /*ScrollTo*/
	$('.totop').click(function(e) {
		$.scrollTo(this.hash || 0, 1000);
		e.preventDefault();
	});
	$('.accordion.works1 li a.title').click(function(e) {
		$.scrollTo($(this).parent('li').parent('ul'), 600);
		e.preventDefault();
	});
	$('a.null').click(function(e) {
		$.scrollTo($('.comments-list'), 600);
		e.preventDefault();
	}); /*Showcase script*/
	var closePortf = $('.works2-close');
	var showcase = $('#big-showcase');
	var more = $('#works2 .proj-img a.more-info');
	var speed = 400;
	showcase.hide();
	more.click(function(e) {
		showcase.slideUp(speed);
		showcase.find('ul li').hide();
		var itemId = $(this).parent().parent().parent().attr('data-id');
		showcase.slideDown(speed);
		showcase.find('.portf-' + itemId).delay(900).slideDown(speed);
		$.scrollTo($('.page-description'), speed);
		closePortf.click(function() {
			showcase.slideUp(speed);
		});
		return false;
	}); /*Accordeon*/
	$('.accordion ul').hide();
	$('.accordion li:first').find('a.title').addClass('tab-active');
	$('.accordion ul:first').show();
	$('.accordion li a.title').click(function() {
		var checkElement = $(this).next();
		if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$('accordion').find('a.title').removeClass('tab-active');
			return false;
		}
		if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('.accordion ul:visible').slideUp(500);
			checkElement.slideDown(500);
			$('.accordion').find('a.title').removeClass('tab-active');
			$(this).addClass('tab-active');
			return false;
		}
	}); 
});
