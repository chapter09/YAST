// JavaScript Document
$(function(){
	$(".bio-toggle").click(bioToggleHandler);
	$(".full-bio").addClass("hidden");
});

function bioToggleHandler(e)
{
	var showMore = $(this).html() == "Show More" ? true : false;
	$(".full-bio").addClass("hidden");
	$(".mini-bio").removeClass("hidden");
	if(showMore)
	{
		var bioContainer = $(this).parent().parent().parent();
		bioContainer.find(".full-bio").removeClass("hidden");
		bioContainer.find(".mini-bio").addClass("hidden");
	}
	return false;
}
$(document).ready(function(){
	$('#stats1').innerfade({
		speed: 1500,
        timeout: 7000,
		type: 'sequence',
		containerheight: '109px'
		});
	}); 
$(document).ready(function(){
	$('#stats2').innerfade({
		speed: 1500,
        timeout: 7000,
		type: 'sequence',
		containerheight: '109px'
		});
	}); 
$(document).ready(function(){
	$('#stats3').innerfade({
		speed: 1500,
        timeout: 7000,
		type: 'sequence',
		containerheight: '109px'
		});
	}); 
