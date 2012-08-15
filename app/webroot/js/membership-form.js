/*------------ Global Vars-----------------------*/

_interests = {};
_interestCounter = 0;
_currentIndustryDBase = "";
_currentPage = 0;
_pages = ["#page1"];


/*-----------------Paging -------------------------*/

$(function(){
  $('#progress-button').click(function(){

	if(_currentPage < _pages.length - 1){
		filterInterests();
	}
	if(_currentIndustryDBase != ""){
		$(".company-information-group").hide();
	}
	
	$("#demandbase-autocomplete ul").hide();
	
	if(_currentPage < _pages.length - 1){
		if(validate())
		{
			$(_pages[_currentPage]).fadeOut(500);
			setTimeout(function(){
				$(_pages[_currentPage + 1]).fadeIn(450);
					_currentPage++;
					if(_currentPage < _pages.length - 1){
						$('#progress-button-label').html("Continue<img src='/exbd-resources/images/design-elements/arrows-chevrons/btn-arrow-white-innershadow-right.png'/>");
					}
					else{
						$('#progress-button-label').html("Submit<img src='/exbd-resources/images/design-elements/arrows-chevrons/btn-arrow-white-innershadow-right.png'/>");
					}
					$('#back-button').show();		
					$('span.progress').html("Step " + (_currentPage + 1) + " of 2");			
				}, 500);
			submitForm();
		}
	}
	else{
		if(validate())
		{
			appendSemicolon();	
			return true;	
		}
	}
    return false;
  });  
  
  
	$('#back-button').click(function(){
		if(_currentIndustryDBase != ""){
			$(".company-information-group").hide();
		}
	
		$(_pages[_currentPage]).fadeOut(500);
		setTimeout(function(){
			$(_pages[_currentPage-1]).fadeIn(450);
			_currentPage--;
			$('#progress-button-label').html("Continue<img src='/exbd-resources/images/design-elements/arrows-chevrons/btn-arrow-white-innershadow-right.png'/>");
			if(_currentPage > 0){
				$('#back-button').show();		
			}
			else{
				$('#back-button').hide();		
			}
		
			$('span.progress').html("Step " + (_currentPage + 1).toString() + " of 2");			
		}, 500);
	return false;
	});  
});

/*--------------- Dynamic Interest Fields --------------*/
function getIndustry()
{
	return $("#Industry").val() ? $("#Industry").val().replace(/ /g,"_") : "";
}
function getDepartment()
{
	return $("#JobFunction").val() ? $("#JobFunction").val().replace(/ /g,"_") : "";
}

function InterestGroup(industry,department,topics)
{
	this.industry=industry;
	this.department=department;
	this.topics =topics;
}

function InterestTopic(label, interests)
{
	this.label = label;
	this.interests = interests;	
}

$(document).ready(function(){
		
	$("#Industry").change(function(e){
		filterInterests();
	});
	
	$("#JobFunction").change(function(e){
		filterInterests();
	});
	
    function loadfail(){
        alert("Error: Failed to read file!");
    }
 
    function parse(document){
        $(document).find("interestGroup").each(function(){
           industry = $(this).find('industry').first().text().replace(/ /g,"_");
           dept =  $(this).find('department').first().text().replace(/ /g,"_");
		   topics = [];
		   $(this).find('interestTopic').each(function() {
				label = $(this).find("topicLabel").first().text();
				interests = [];
				$(this).find('interest').each(function(){
					interests.push($(this).text());
				});
				
				topics.push(new InterestTopic(label,interests));	   
       		});
			
			_interests[industry + "-" + dept] = new InterestGroup(industry,dept,topics);
		});
		
		$.each(_interests, function(index, value) { 
			 $("#interest-scrollbox").append(createInterestGroupDOM(value)); 
		});	
    }
		
	function createInterestGroupDOM(group)
	{
		var interestGroup = $("<div class='interest-group'></div>");
		interestGroup.attr("id",group.industry + '-' + group.department);
		
		$.each(group.topics, function(index, topic){
			var heading = $("<p><label class='heading'>" + topic.label +"</label></p>");
			var checkboxGroup = $("<p class='group'></p>");
			
			$.each(topic.interests, function(index, interest){
				var input = $("<input class='interest-checkbox' type='checkbox'/>");
				_interestCounter++;
				input.attr("value",interest);
				input.attr("name", "interest"+_interestCounter);
				input.attr("id", "interest"+_interestCounter);
				
				var label = $("<label class='checkbox'>" + interest + "</label>");
				label.attr("for", "interest"+_interestCounter);
				
				checkboxGroup.append(input);
				checkboxGroup.append(label);
			});
			
			interestGroup.append(heading);
			interestGroup.append(checkboxGroup);
		});
		return interestGroup;
	}
 
    // $.ajax({
    //     url: '/exbd-resources/scripts/forms-quizzes/membership-form-interests-list.xml',    // name of file with our data
    //     dataType: 'xml',    // type of file we will be reading
    //     success: parse,     // name of function to call when done reading file
    //     error: loadfail     // name of function to call when failed to read
    // });
});


function filterInterests() {
	var industry = _currentIndustryDBase == "" ? getIndustry() : _currentIndustryDBase;
	var groupStr = "#" + industry + "-" + getDepartment();
	if($(groupStr.toString()).length == 0)
	{
		groupStr = "#Catch_All-" + getDepartment();
	}
	var group = $(groupStr.toString());
	
	$(".interest-group").hide();
	$(".interest-checkbox").removeAttr('checked');

	group.show();
}

function submitForm() {	
	dataString = $("form").serialize();

	$.ajax(
	{
		type: "POST",
		url: "http://now.eloqua.com/e/f2.aspx",
		data: dataString,
		success: function(data) {

		}
	});
}

/*-------------- Demand Base ------------------ */

var _emailEntered = false;
var _companyEntered = false;

var myCallback = function(data) {
	// A selection was made from the drop down
	if (pick = data.pick) {
		if (pick.company_name) {
			_companyEntered = true;
			resetDemandbaseFields();
			demandbaseParse(pick);
			return;
		}
	}
	
	//an email was entered
	if (person = data.person) {
		if(person.company_name && !_companyEntered)
		{
			_emailEntered = true;
			resetDemandbaseFields();
			demandbaseParse(person);
			return;
		}
	}
	
	//a typed in company was found
	/*if (input_match = data.input_match ) {
		if(input_match.company_name && !_companyEntered && !_emailEntered)
		{
			resetDemandbaseFields();
			demandbaseParse(input_match);
		}
	}*/
};

Demandbase.CompanyAutocomplete.widget({
company: "Organization",
email: "Email",
key: "80287f1acf0279722cdfc1b634c28ff2b9a65eef",
callback: myCallback
});


function demandbaseParse(result){
	if(!result)
		return;
		
	var annual_sales = result.annual_sales ? result.annual_sales : "";
	var city = result.city ? result.city : "";
	var company_name = result.company_name ? result.company_name : "";
	var country = result.country ? result.country : "";
	var employee_count = result.employee_count ? result.employee_count : "";
	var employee_range = result.employee_range ? result.employee_range : "";
	var industry = result.industry ? result.industry : "";
	var phone = result.phone ? result.phone : "";
	var primary_sic = result.primary_sic ? result.primary_sic : "";
	var revenue_range = result.revenue_range ? result.revenue_range : "";
	var state = result.state ? result.state : "";
	var stock_ticker = result.stock_ticker ? result.stock_ticker : "";
	var street_address = result.street_address ? result.street_address : "";
	var sub_industry = result.sub_industry ? result.sub_industry : "";
	var web_site = result.web_site ? result.web_site : "";
	var zip = result.zip ? result.zip : "";
		
	$("#C_DBase_Annual_Sales1").attr("value",annual_sales);
	$("#C_DBase_City1").attr("value",city);
	$("#C_DBase_Company_Name1").attr("value",company_name);
	$("#C_DBase_Country1").attr("value",country);
	$("#C_DBase_Employee_Count1").attr("value",employee_count);
	$("#C_DBase_Employee_Range1").attr("value",employee_range);
	$("#C_DBase_Industry1").attr("value",industry);
	$("#C_DBase_Corporate_Phone1").attr("value",phone);
	$("#C_DBase_Primary_SIC1").attr("value",primary_sic);
	$("#C_DBase_Revenue_Range1").attr("value",revenue_range);
	$("#C_DBase_State1").attr("value",state);
	$("#C_DBase_Stock_Ticker1").attr("value",stock_ticker);
	$("#C_DBase_Street_Address1").attr("value",street_address);
	$("#C_DBase_Sub_Industry1").attr("value",sub_industry);
	$("#C_DBase_Website1").attr("value",web_site);
	$("#C_DBase_Zip1").attr("value",zip);
	
	$('#Country').append('<option value="' + country + '" selected="selected">' + country + '</option>');
	$("#Country").attr("value",country);
	$('#Industry').append('<option value="' + industry + '" selected="selected">' + industry + '</option>');
	$("#Industry").attr("value",industry);
	$('#AnnualRevenue').append('<option value="' + revenue_range + '" selected="selected">' + revenue_range + '</option>');
	$("#AnnualRevenue").attr("value",revenue_range);
	
	_currentIndustryDBase = industry.replace(/ /g,"_"); //for dynamic interest list
	filterInterests();

}

function resetDemandbaseFields(){
	$("#C_DBase_Annual_Sales1").attr("value","");
	$("#C_DBase_City1").attr("value","");
	$("#C_DBase_Company_Name1").attr("value","");
	$("#C_DBase_Country1").attr("value","");
	$("#C_DBase_Employee_Count1").attr("value","");
	$("#C_DBase_Employee_Range1").attr("value","");
	$("#C_DBase_Industry1").attr("value","");
	$("#C_DBase_Corporate_Phone1").attr("value","");
	$("#C_DBase_Primary_SIC1").attr("value","");
	$("#C_DBase_Revenue_Range1").attr("value","");
	$("#C_DBase_State1").attr("value","");
	$("#C_DBase_Stock_Ticker1").attr("value","");
	$("#C_DBase_Street_Address1").attr("value","");
	$("#C_DBase_Sub_Industry1").attr("value","");
	$("#C_DBase_Website1").attr("value","");
	$("#C_DBase_Zip1").attr("value","");
	
	$("#Country").attr("value","");
	$("#Industry").attr("value","");
	$("#AnnualRevenue").attr("value","");
	
}


/* ----------------- Validation ----------------------*/
$(function(){ $("SELECT").selectBox(); });
$(function(){ $("label").inFieldLabels(); });

$(document).ready( function(){			

	membership=getQueryStringParamValue("m");
	if( membership != "" ){
		$("#Member").val( membership );
	}
});


function validate(){
	
	var fieldsArray = [];
	var dropDownArray = [];
	
	if(_currentPage >= 0)
	{
		fieldsArray.push("#FirstName");
		fieldsArray.push("#LastName");
		fieldsArray.push("#Organization");
		fieldsArray.push("#Email");
		fieldsArray.push("#Phone");
		
		dropDownArray.push("#Position");
		dropDownArray.push("#JobFunction");		
	}
	
	if(
		(navigator.userAgent.match(/iPhone/i)) || 
		(navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/iPod/i)) || 
		($.browser.msie)
	){
		fieldInterest = $("#Interests2").find("option:selected");
	}
	else {
		fieldInterest = $("#interests-box .selectBox-options .selectBox-selected");
	}

	//Validate
	validationflag = true;
	//Check fields			
	for( i = 0; i < fieldsArray.length; i++ )
	{
		theElement = $( fieldsArray[i] );
		if(theElement.attr("value") == ""){
		  alert(theElement);
			validationflag = false;
			theElement.addClass("invalid");
		}
		else if( fieldsArray[i] == "#Email" && ( theElement.attr("value").indexOf("@") == -1 || theElement.attr("value").indexOf(".") == -1 )){
			validationflag = false;
			theElement.addClass("invalid");
			alert(theElement);
		}	
		else{
			theElement.removeClass("invalid").addClass("valid");
		}
	}
	
	//Check Drop Downs
	for( i = 0; i < dropDownArray.length; i++ ){
		theElement = $( dropDownArray[i] );
		if(
		   (navigator.userAgent.match(/iPhone/i)) || 
		   (navigator.userAgent.match(/Android/i)) ||
		   (navigator.userAgent.match(/iPad/i)) ||
		   (navigator.userAgent.match(/iPod/i))
		){
			if(theElement.find("option:selected").html().indexOf("*") != -1){
				validationflag = false;
				theElement.addClass("invalid");
			}
			else {
				theElement.removeClass("invalid").addClass("valid");
			}
		}
		else if($.browser.msie){
			
			if(theElement.find("option:selected").html().indexOf("*") != -1){
				validationflag = false;
				theElement.parent().addClass("invalid");
			}
			else {
				theElement.parent().removeClass("invalid").addClass("valid");
			}
		}
		else{
			if(theElement[0].selectedIndex == 0){
				validationflag = false;
				theElement.next().addClass("invalid");
			}
			else{
				theElement.next().removeClass("invalid").addClass("valid");	
			}
		}
	}

	if( validationflag != true ){
		alert("Please fill out all required fields");
		return false;
	}
	return true;			
}

/* ------------------- Membership Inquiry Form ----------------------- */

<!-- Begin append semicolon function -->
function appendSemicolon()
{
	var tempData = "";
	var interests = $("#Interests");
	var checkedBoxes = $(".interest-checkbox:checked");
	checkedBoxes.each(function(){
		tempData += $(this).attr("value") + "::";
	});
	
	interests.attr("value",tempData);
}

<!-- Begin query string parsing function -->
function getQueryStringParamValue(keyvalue)
{
	var params = {};
	var strURL = document.location.href;
	var qs = '';

	if (strURL.indexOf('?') != -1)
		qs = strURL.substr(strURL.indexOf('?') + 1);
	if (qs.length == 0)
		return '';

	// Turn <plus> back to <space>
	// See: http://www.w3.org/TR/REC-html40/interact/forms.html#h-17.13.4.1
	qs = qs.replace(/\+/g, ' ');
	var args = qs.split('&'); // parse out name/value pairs separated via &

	for (var i = 0; i < args.length; i++)
	{
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

<!-- Begin hidden field population from query string -->
function setMediaChannel()
{
	var formFieldId = 'cid';

	if (getQueryStringParamValue)
	{

		(getQueryStringParamValue('cid') == '')? null : document.getElementById(formFieldId).value = getQueryStringParamValue('cid');
		
	}
}
<!-- End hidden field population from query string -->

window.onload = function()
{
	setMediaChannel();
	invertCheckBoxValue();
}
<!-- Begin invert check box value function -->
function invertCheckBoxValue()
{
	inputCheckBox=document.getElementById("OptIn");
	inputTextBox=document.getElementById("OptOut");
	if(inputCheckBox && inputCheckBox.checked)
		inputTextBox.value=0;
	else if(inputTextBox)
		inputTextBox.value=1;
}
<!-- End invert check box value function -->


