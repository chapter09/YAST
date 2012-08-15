$(document).ready(function() {
  $('#slide').xfade({
    timeout: 5000,
//	order: 'random',
    effect: 'fade',
    navigation: true
  });
  $("#hero-nav").append($(".xfade-nav")[0]);
  $(".xfade-nav a").click( function(){
		var index = $(this).html();
		$(".fade-text").hide();
		$(".fade-text").eq(index-1).fadeIn(1000);
  });
});

var REGION_FILTERS = ["North America", "Europe"];
var INDUSTRY_FILTERS = ["Aerospace & Defense", "Business Service", "Technology & Software", "Construction Materials", "Energy & Utilities", "Industrial Manufacturing", "Insurance", "Media", "Transportation Services", "Food Services", "Semiconductors"];
var FUNCTIONAL_FILTERS = ["Innovation & Strategy", "Human Resources", "Information Technology", "Sales and Marketing", "Legal, Risk & Compliance", "Procurement & Operations"];
var REVENUE_FILTERS = ["Under $500M", "$500M to $3B", "$3B to $10B", "$10B and Above"];
var FILTER_NAMES = ["Region","Industry","Functional Area","Revenue Band"];
var FILTER_ARRAYS = [REGION_FILTERS, INDUSTRY_FILTERS, FUNCTIONAL_FILTERS, REVENUE_FILTERS];

$(function(){
	$('.dropdown a').click(filterClickHandler);
	$('#view-all a').click(allClickHandler);
	$('.dropdown a').hover(function() {
		$("#buttons li#filter ul.dropdown").removeClass("hidden");
	});
	$('.dropdown a').hover(function() {
		$("#buttons li#filter ul.dropdown").removeClass("hidden");
	});
	$('#filter a:first').click(function() {
		return false;
	});

});

function allClickHandler(e)
{
	$("#view-all a").addClass("active");
	$("#filter a:first").removeClass("active");
	$('#filter a:first').html("Filter List");
	var testimonials = $('.testimonials a');
	jQuery.each(testimonials, function(){
		$(this).css('display', 'inline');	
	});
	return false;
}

function filterClickHandler(e)
{
	var clickClass = $(this).attr('class');
	var filterIndex;
	switch(clickClass.charAt(0))
	{
		case "r":
			filterIndex = 0;
			break;
		case "i":
			filterIndex = 1;
			break;
		case "f":
			filterIndex = 2;
			break;
		case "b":
			filterIndex = 3
			break;	
	}
	
	$('#filter a:first').html(FILTER_NAMES[filterIndex] + ": " + FILTER_ARRAYS[filterIndex][parseInt(clickClass.substring(1)) - 1]);	
	$("#view-all a").removeClass("active");
	$("#filter a:first").addClass("active");
	$("#buttons li#filter ul.dropdown").addClass("hidden");
	
	var testimonials = $('.testimonials a');	
	jQuery.each(testimonials, function(){
		var testimonialClass = $(this).attr('class');
		if(testimonialClass.indexOf(clickClass) != -1)
		{
			$(this).css('display', 'inline');	
		}
		else
		{
			$(this).css('display', 'none');
		}
	});
	
	return false;
}