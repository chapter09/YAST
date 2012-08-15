// JavaScript Document

///////// Persistent Query String Script //////////
///////// a.k.a. Follow Me Query String //////////
///////// a.k.a. Saved Parameters Script //////////

<!-- Begin query string parsing function -->
    function getQueryStringParamValue(keyvalue) {
        var params = {};
        var strURL = document.location.href;
        var qs = '';
 
        if (strURL.indexOf('?') != -1) {
            qs = strURL.substr(strURL.indexOf('?') + 1);
        }
        if (qs.length == 0) {
            return '';
        }
 
        // Turn <plus> back to <space>
        // See: http://www.w3.org/TR/REC-html40/interact/forms.html#h-17.13.4.1
        qs = qs.replace(/\+/g, ' ');
        var args = qs.split('&'); // parse out name/value pairs separated via &
 
        for (var i = 0; i < args.length; i++) {
            var pair = args[i].split('=');
            var name = decodeURIComponent(pair[0]);
            var value = (pair.length == 2) ? decodeURIComponent(pair[1]) : name;
            params[name] = value;
        }
 
        var qsparam = params[keyvalue];
        //alert(qsparam);
        return (qsparam != null) ? qsparam : '';
    }

<!-- End query string parsing function -->


<!-- Begin append cid to links -->

	$(document).ready( function()
	{
	
		var urlParam = ["cid", "m"];
		var valueParam = new Array( urlParam.length);

	
				$("a").each( function()
				{
					
				//Go through each parameter
					for( var i in urlParam )
					{
						valueParam[i] =  getQueryStringParamValue( urlParam[i] );
			
						if( valueParam[i] != '')
						{
				
							checkLink = $(this).attr("href");
							
							//added to remove a teamsite trailing '?' added to links
							if(checkLink && checkLink.charAt(checkLink.length - 1) == '?')
							{
								checkLink = checkLink.substring(0,checkLink.length - 1);
								$(this).attr("href",checkLink);
							}
							
							
							if( checkLink != null )			
							{
								
								getOnclick = $(this).attr("onClick");
								
								//If link contains executiveboard.com and contains www or
								// doesn't start with http:
								// and doesn't start with mail
								
								if( ((  (checkLink.toLowerCase().indexOf("executiveboard.com") != -1 && checkLink.toLowerCase().indexOf("www.") != -1 ) || checkLink.substr(0,4).toLowerCase() != "http" ||  checkLink.toLowerCase().indexOf("events.executiveboard.com") != -1 || checkLink.toLowerCase().indexOf("forms.executiveboard.com") != -1) && checkLink.substr(0,6).toLowerCase() != "mailto") || getOnclick != null )
								{
									
		
									if( getOnclick != null )
									{
										
										if( (getOnclick.indexOf(".html") != -1) || (getOnclick.indexOf(".page") != -1) )
										{
											getFirst=getOnclick.indexOf("'");
											firstHalf = getOnclick.substr(0, getFirst);
											
											ii=getOnclick.substr(getFirst+1);
											jj=ii.indexOf("'");
											lastHalf = ii.substr(jj+1);
											midSection=ii.substr(0, jj);
											
											//If not a jump link
											if( midSection.indexOf("#") == -1)
											{
												//There are parameters in the link  
												if( midSection.indexOf("?") != -1)
												{
													//If param does not exist, append to URL    
													if (midSection.toLowerCase().indexOf( urlParam[i] + "=") == -1)
													{
														if( valueParam[i] != '')
														{
															
															getOnclick = firstHalf + "'" + midSection  + "&" + urlParam[i] + "=" + valueParam[i] + "'" + lastHalf;
															
															$(this).attr("onClick", getOnclick)
														}
															
													}
													else
													//Already exist, replace the current ones with the new one
													{
														if( valueParam[i] != '') 
														{
															var re = new RegExp( "(" + urlParam[i] + "=.*?&)|(" + urlParam[i] + "=.*)" , "i")
															getOnclick = firstHalf + "'" + midSection.replace(re, urlParam[i] + "=" + valueParam[i] + "&").replace(/&$/, "")  + "'" + lastHalf;
															
															$(this).attr("onClick", getOnclick);
														}
														
													}
												}
												//There are no parameters in the link  
												else
												{
						
													if( valueParam[i] != '')
													{
														
														getOnclick = firstHalf + "'" + midSection  + "?" + urlParam[i] + "=" + valueParam[i] + "'" + lastHalf;

														$(this).attr("onClick", getOnclick);

													}
												}
											}	
										}
										
										else
										{

											//If not a jump link
											if( $(this).attr("href").indexOf("#") == -1)
											{
												//There are parameters in the link  
												if( $(this).attr("href").indexOf("?") != -1)
												{
													//If param does not exist, append to URL    
													if ($(this).attr("href").toLowerCase().indexOf( urlParam[i] + "=") == -1)
													{
														if( valueParam[i] != '')
															$(this).attr("href", $(this).attr("href") + "&" + urlParam[i] + "=" + valueParam[i]);


													}
													else
													//Already exist, replace the current ones with the new one
													{
														if( valueParam[i] != '') 
															$(this).attr("href", $(this).attr("href").replace(/(cid=.*?&)|(cid=.*)/i, urlParam[i] + "=" + valueParam[i] + "&").replace(/&$/, ""));

													}
												}
												//There are no parameters in the link  
												else
												{

													if( valueParam[i] != '')
														$(this).attr("href", $(this).attr("href") + "?" + urlParam[i] + "=" + valueParam[i]);
												}
											}

										}
										
									}
								
									else
									{
										
										//If not a jump link
										if( $(this).attr("href").indexOf("#") == -1)
										{
											//There are parameters in the link  
											if( $(this).attr("href").indexOf("?") != -1)
											{
												//If param does not exist, append to URL    
												if ($(this).attr("href").toLowerCase().indexOf( urlParam[i] + "=") == -1)
												{
													if( valueParam[i] != '')
														$(this).attr("href", $(this).attr("href") + "&" + urlParam[i] + "=" + valueParam[i]);
													
														
												}
												else
												//Already exist, replace the current ones with the new one
												{
													if( valueParam[i] != '') 
														$(this).attr("href", $(this).attr("href").replace(/(cid=.*?&)|(cid=.*)/i, urlParam[i] + "=" + valueParam[i] + "&").replace(/&$/, ""));
													
												}
											}
											//There are no parameters in the link  
											else
											{
					
												if( valueParam[i] != '')
													$(this).attr("href", $(this).attr("href") + "?" + urlParam[i] + "=" + valueParam[i]);
											}
										}
										
									}
									
								}
								
							}
					
						}
					
					}
						
	
				});

	});
	
///////// Services Dropdown Toggle Script //////////
var hoverstate= 0;
var hoverdone= true;
function checkHoverstate(){
	setTimeout(function(){checkHoverstate()},200);
	if(hoverstate==1){
		if(!$(".service-toggle").hasClass("hover")){
		$('.service-toggle').addClass("hover");
		hoverdone= false;
		$('.services-dropdown').slideToggle('medium', function() {
    			hoverdone= true;
  			});
		}
	}
	if(hoverstate==0){
		if($(".service-toggle").hasClass("hover")){
		$('.service-toggle').removeClass("hover");
		hoverdone= false;
		$('.services-dropdown').slideToggle('medium', function() {
    			hoverdone= true;
  			});
		}
	}
}
$(document).ready(function () {
	$('.service-toggle').hover(function (){
		if(hoverdone==true)
			hoverstate= 1;
	});
	$('.service-toggle').mouseout(function ()
	{
		if(hoverdone==true)
			hoverstate= 0;
	});
	$('.services-dropdown li').hover(function ()
	{
		if(hoverdone==true)
			hoverstate= 1;
	});
	$('.services-dropdown li').mouseout(function ()
	{
		if(hoverdone==true)
			hoverstate= 0;
	});
	checkHoverstate();
	$("#action").hover( function(){
	});
});



//secondary nav script
$(function(){
	$("ul#services a").each(function(){
		var $this = $(this);
		var href = $this.attr("href");
		var pathname = window.location.pathname + "?";
		if(pathname.indexOf(href) != -1)
		{
			$this.addClass("active");
		}	
	});
});
