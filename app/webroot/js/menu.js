//$j = jQuery.noConflict();
$j = $;
$j(function(){ 
    $j("ul#nav-dropdown li").hover(function(){         
        $j(this).addClass("hover");
        $j('ul:first',this).css('display', 'block');    
    }, function(){    
        $j(this).removeClass("hover");
        $j('ul:first',this).css('display', 'none');    
    });   
});