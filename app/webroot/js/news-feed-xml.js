// JavaScript Document

$(document).ready(function(){
	var feedSource = $('#feed-source').data("url");
	var feed = new google.feeds.Feed(feedSource);

	// Request the results in XML
	feed.setResultFormat(google.feeds.Feed.XML_FORMAT);
	
	// Calling load sends the request off.  It requires a callback function.
	feed.load(feedLoaded);
}); 

/*
*  How to receive results in XML.
*/

google.load("feeds", "1");
function formatMonth( monthInput )
{

	var months = new Array(12);
	months[0] = "January";
	months[1] = "February";
	months[2] = "March";
	months[3] = "April";
	months[4] = "May";
	months[5] = "June";
	months[6] = "July";
	months[7] = "August";
	months[8] = "September";
	months[9] = "October";
	months[10] = "November";
	months[11] = "December";
	
	return months[ monthInput - 1 ];
	
}

function formatDate( pubDate )
{

	var currentTime = new Date();
	var month = currentTime.getMonth() + 1;
	var day = currentTime.getDate();
	var year = currentTime.getFullYear();
	todaysDate = day + " " + formatMonth(month) + " " + year;
	
	yesterdaysTime = new Date()
	dt = yesterdaysTime.getDate();
	yesterdaysTime.setDate(dt - 1);
	
	var ymonth = yesterdaysTime.getMonth() + 1;
	var yday = yesterdaysTime.getDate();
	var yyear = yesterdaysTime.getFullYear();
	
	yesterdaysDate = yday + " " + formatMonth(ymonth) + " " + yyear;

	
	theDate=$(pubDate).text().split(" ");
	var pubDateDay = theDate[0].substr(0, theDate[0].length - 1);
	var pubDateDay2 = theDate[1];
	var pubDateMonth = theDate[2];
	var pubDateYear = theDate[3];
	
	switch (pubDateDay)
	{
		case "Mon":
			pubDateDay = "Monday";
			break;
			
		case "Tue":
			pubDateDay = "Tuesday";
			break;
			
		case "Wed":
			pubDateDay = "Wednesday";
			break;

		case "Thu":
			pubDateDay = "Thursday";
			break;
			
		case "Fri":
			pubDateDay = "Friday";
			break;
			
		case "Sat":
			pubDateDay = "Saturday";
			break;
			
		case "Sun":
			pubDateDay = "Sunday";
			break;
	}
	
	switch (pubDateMonth)
	{
		case "Jan":
			pubDateMonth = "January";
			break;
			
		case "Feb":
			pubDateMonth = "February";
			break;
			
		case "Mar":
				pubDateMonth = "March";
				break;
			
		case "Apr":
			pubDateMonth = "April";
			break;

		case "May":
			pubDateMonth = "May";
			break;
			
		case "Jun":
			pubDateMonth = "June";
			break;
			
		case "Jul":
			pubDateMonth = "July";
			break;	
			
		case "Aug":
			pubDateMonth = "August";
			break;	
			
		case "Sep":
			pubDateMonth = "September";
			break;	
			
		case "Oct":
			pubDateMonth = "October";
			break;	
			
		case "Nov":
			pubDateMonth = "November";
			break;	
			
		case "Dec":
			pubDateMonth = "December";
			break;	
	}
	
	var publishedDate = pubDateDay + ", " + pubDateDay2.replace(/^0+/, '') + " " + pubDateMonth + " " + pubDateYear;		

	if ( yesterdaysDate == (pubDateDay2.replace(/^0+/, '') + " " + pubDateMonth + " " + pubDateYear) )
		return "Yesterday";
	else if( todaysDate == (pubDateDay2.replace(/^0+/, '') + " " + pubDateMonth + " " + pubDateYear) )
		return "Today";
	else	
		return publishedDate;
}
// Our callback function, for when a feed is loaded.
function feedLoaded(result) {
  if (!result.error) {
    // Get and clear our content div.
    //var content = document.getElementById('feed');
    $("#feed ul").html('');

	$(result.xmlDocument).find("item").each(function(){
		var title = $(this).find("title")[0];
		var linkURL = $(this).find("link")[0];
		var pubDate = $(this).find("pubDate")[0];
		//alert(pubDate);
		$("#feed ul").append("<li><a href='" + $(linkURL).text() + "' title='" + $(title).text() + "' target='_blank'>" + $(title).text() + "</a><br /><span>" + formatDate(pubDate) + "</span></li>");	
	});

    // Get all items returned.
    /*var items = result.xmlDocument.getElementsByTagName('item');
    // Loop through our items
    for (var i = 0; i < items.length; i++) {
      var item = items[i];

      // Get the title from the element.  firstChild is the text node containing
      // the title, and nodeValue returns the value of it.
      var title = item.getElementsByTagName('title')[0].firstChild.nodeValue;
		$("#feed ul").append("<li><a href='#' title='" + title + "'>" + title + "</a></li>");
    }*/
  }
}
