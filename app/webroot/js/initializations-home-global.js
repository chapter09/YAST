/*Initializes Home Carousel*/
$(document).ready(function() {
  setTimeout (function(){
	  $('#slide').xfade({
		timeout: 12000,
		effect: 'fade',
		navigation: true  
	  });
	  $("#hero-nav").append($(".xfade-nav"));
  		$(".xfade-nav a").click( function(){
		var index = $(this).html();
		$(".fade-text").hide();
		$(".fade-text").eq(index-1).fadeIn(1000);
  });
	},10);
});
/*Initializes Insights & News Widgets*/
$(function(){
  var slider = $('#insights').bxSlider({
    controls: false,
	displaySlideQty: 3,	
	randomStart: true	
  });
  $('#go-prev').click(function(){
    slider.goToPreviousSlide();
    return false;
  });

  $('#go-next').click(function(){
    slider.goToNextSlide();
    return false;
  });
  $('#news').bxSlider({
    mode: 'fade',
    controls: true
  });
  $("#news-widget h2").append($(".bx-prev"));
  $("#news-widget h2").append($(".bx-next"));
});
/*Keeps Home Image Centered*/
$(function(){
  $(window).resize(resizeFunction);
  resizeFunction();
});

function resizeFunction() {
  	var winWidth = $(window).width();
    var $wrapperDiv = $("#slide-wrapper");
	var $wrapperLi = $("#slide-wrapper li");
	if(winWidth	< 960)
	{
		$wrapperDiv.css("width", "960px");
		$wrapperLi.css("width", "960px");
	}
	else if(winWidth < 1200)
	{
		$wrapperDiv.css("width", winWidth + "px");
		$wrapperLi.css("width", winWidth + "px");
	}
	else
	{
		$wrapperDiv.css("width", "1200px");	
		$wrapperLi.css("width", "1200px");	
	}
}