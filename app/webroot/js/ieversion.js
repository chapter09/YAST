document.write("<!--[if IE 6]>");
document.write("<link href=\"/exbd-resources/styles/ie6.css\" rel=\"stylesheet\" type=\"text/css\" />");
document.write("<![endif]-->");
document.write("<!--[if IE 7]>");
document.write("<link href=\"/exbd-resources/styles/ie7.css\" rel=\"stylesheet\" type=\"text/css\" />");
document.write("<![endif]-->");

var url = window.location;
if ( /\/careers\//i.test(url) ) 
{
	document.write("<!--[if IE 6]>");
	document.write("<link href=\"/exbd-resources/careers/careers-ie6.css\" rel=\"stylesheet\" type=\"text/css\" />");
	document.write("<![endif]-->");
	document.write("<!--[if IE 7]>");
	document.write("<link href=\"/exbd-resources/careers/careers-ie7.css\" rel=\"stylesheet\" type=\"text/css\" />");
	document.write("<![endif]-->");    
}
if ( /\/executive-guidance\//i.test(url) ) 
{
	document.write("<!--[if IE 6]>");
	document.write("<link href=\"/exbd-resources/styles/campaigns/customizations/eg/guidance-ie6.css\" rel=\"stylesheet\" type=\"text/css\" />");
	document.write("<![endif]-->");
	document.write("<!--[if IE 7]>");
	document.write("<link href=\"/exbd-resources/styles/campaigns/customizations/eg/guidance-ie7.css\" rel=\"stylesheet\" type=\"text/css\" />");
	document.write("<![endif]-->");    
}