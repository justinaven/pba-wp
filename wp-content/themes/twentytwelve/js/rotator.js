var slideshow = $('.slideshow'); 
var img_block = slideshow.find('.img-block');
var display_time = 3000;
var fade_time = 1500;
var fade_in_time = 1500;

var first_img_block = slideshow.find(':first-child'); 

if(first_img_block.hasClass('on')) {}
else {first_img_block.addClass('on');}

if(img_block.length>1)
{ 
		var rotator_interval = setInterval(function() {
				nextImage();
	}, display_time+fade_time+fade_in_time);
}


function nextImage(){
	var showing = slideshow.find('.on');
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
		$('.slideshow').find('.img-block:first-child').css('opacity',0).addClass('on').animate({opacity:1},fade_in_time);
	}
}

$('.slideshow').css({'width':'auto','height':'auto'});
$('.slideshow').css('height',Math.ceil(slideshow.width()*slideshow.attr('data-ratio'))+'px');

$(window).resize(function() {
	slideshow.css('height',Math.ceil(slideshow.width()*slideshow.attr('data-ratio'))+'px');
});



