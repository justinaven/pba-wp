window.onload=function(){
	$('.success').addClass('down');
	setInterval( function() {
			$('.success').removeClass('down');
	}, 7000);
};

$(document).ready(function(){
	
	var windowSize = $(window).width();
	var itsMobile;
	if(windowSize>550){itsMobile=false;}else{itsMobile=true;}

	// adds js class to html tag
	$('html').addClass('js'); 

	// $('.nav .no-link a').on('click', function(e){
	// 	e.preventDefault();
	// 	$(this).closest('li').toggleClass('expanded');
	// });
	$('.nav .no-link a').on('click', function(e){
		if($(this).parent().hasClass('no-link')){e.preventDefault();}
		if(windowSize<550){
			$(this).closest('li').toggleClass('expanded');
			$(this).closest('li').find('ul').slideToggle('fast', function() {});
		}
	});

	// create mobile nav
	var galleries = $('.touch .nav .no-link');
	if(galleries.length && itsMobile===true){
		var nav_copy = '<div class="galleries-mobile-nav">'+galleries.html()+'</div>';
		$('body').prepend(nav_copy);
		galleries.find('a').on('click', function(){
			mobile_nav = $('.galleries-mobile-nav');
			if(mobile_nav.hasClass('show'))
				{ mobile_nav.removeClass('show'); }
			else
				{ mobile_nav.addClass('show'); }
		});
	}

	// test to see if google font loads
	WebFontConfig = { google: { families: [ 'Tangerine' ] } };
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();

	// form submitted message
	if(window.location.hash=='#success') {
		$('.header-outer').append('<p class="success">Your form was submitted successfully.<p>');
	}

	// Cat Title and Text block
	// ==================================
	var cat_info = $('.cat-info');
	var cat_title = $('.cat-title');
	if(cat_info.find('.text-block').length) {
		var info = cat_info.html();
		cat_title.append(info);

		var init_cat_title_width = cat_title.outerWidth();
		cat_title.find('h2').on('click', function() {
			if(itsMobile===false){
				if(cat_title.hasClass('on')){
					closeCat();
				} else {
			 		init_cat_title_width = cat_title.outerWidth();
					cat_title.css({
						'width':init_cat_title_width+'px',
						'min-width':init_cat_title_width+'px'
					}).addClass('on').animate({
						width:'30%', 'min-width':'250px', 'padding':'10px 20px 20px'},100,function(){
							cat_title.find('.text-block').css('height','auto').show(200);
					});
				}
			}
		});
	} // END if(cat_info.length)
	 
	function closeCat() {
		cat_title.find('.text-block').hide(200, function(){});
		cat_title.removeClass('on').animate({'width':init_cat_title_width,'min-width':init_cat_title_width, 'padding':'0'},300, function(){});
	};

	// Slideshow
	// =================================
	var interval = setInterval(function(){
		if($('.lte-ie8').length>0 || !$('.csstransitions').length>0 )
		{oldCycle();}
		else {cycle();}
	},7000);

	var ss = $('.slideshow');
	var first_img = ss.find('.img-block').first();
	var last_img = ss.find('.img-block').last();
	var fade_time = 1500;
	var fade_in_time = 1500;


	function cycle() {
		var next_img = ss.find('.on').removeClass('on').next();
		if(next_img.length==0) {
			next_img = first_img;
		}
		next_img.addClass('on');
	}

	function oldCycle() {
		var showing = ss.find('.on');
		if(showing.next().length) 
		{ 
			showing.animate({opacity:0},fade_time, function(){
				$(this).removeClass('on');
			});
			showing.next().css('opacity',0).addClass('on').animate({opacity:1},fade_in_time);
		}
		else 
		{ 
			showing.animate({opacity:0},fade_time, function(){
				$(this).removeClass('on');
			});
			ss.find('.img-block:first-child').css('opacity',0).addClass('on').animate({opacity:1},fade_in_time);
		}
	}

	$(window).resize(function() {
		windowSize = $(this).width();
		if($(this).width()>550){itsMobile=false;}else{itsMobile=true;}
		if(cat_title.hasClass('on')){closeCat();}
		$('.nav .no-link ul').attr('style','').closest('.no-link').removeClass('expanded');
	});

});
