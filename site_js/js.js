// www.dontemployme.com - JavaScript Document

//Fuction to check empty fields
function Empty(param1, message, location)
{
	var itemid = $("#"+param1).val();
	
	if(itemid == null || itemid == "")
	{
		$("#"+location).html("<font color = \"red\">"+message+"</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		$("#"+param1).focus();
		
		return false;
	}
	else
	{
		return true;	
	}
}

//Function to allow only numbers
function onlyNumbers(enteredkey, location)
{
	$("#"+enteredkey).keypress(function (e){
	  var charCode = (e.which) ? e.which : e.keyCode;
	  if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 43 && charCode != 8 && charCode != 46 && charCode != 110 && charCode != 190) {
		$("#"+location).html("<font color = 'red'>Only numeric values are allowed</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		return false;
	  }
	  else
	  {
		$("#"+location).html("");
	  }
	});
}

//Check passwords
function checkPasswordMatch(password1,password2, location)
{
	password1 = $("#"+password1).val();	
	
	password2 = $("#"+password2).val();	
	
	if(password1 != password2)
	{
		$("#"+location).html("<font color = \"red\">The two passwords do not match </font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		$("#password1").focus();
		
		return false;
	}
	else
	{
		$("#phoneno").focus();
		
		return true;	
	}
}

//Function to check Username
function checkUsername(username, location)
{
	username = $("#"+username).val();
	
	$("#"+location).html("<font color = \"#85B525\">Checking Username . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/checkthisusername.php",
	{ username: username },
		function(data){
		
		if(data == 100)
		{
			$("#"+location).html("<font color = \"green\">Username <b>"+username+"</b> Available </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#password1").focus();
		}
		else if(data == 60)
		{
			$("#"+location).html("<font color = \"red\">Username <b>"+username+"</b> must be morethan 6 characters </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#password1").focus();
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Username <b>"+username+"</b> already in use </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#password1").focus();
		}
	}
	);
	
	return false;
}

//Function to check password length
function checkPwLength(passwd, location)
{
	password = $("#"+passwd).val();
	
	len = password.length;
	
	if(len < 6)
	{
		$("#password1").focus();
		
		$("#"+location).html("<font color = 'red'>Password entered is too short, minimum allowed characters is 6 (SIX)</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		return false;		
	}
	else
	{
		if(len == 6)
		{
			$("#"+location).html("<font color = 'green'>Password strength <b>WEAK</b></font> <img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#phoneno").focus();
		}
		else if(len > 6 && len <= 12)
		{
			$("#"+location).html("<font color = 'green'>Password strength <b>STRONG</b></font> <img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#phoneno").focus();
		}
		else
		{
			$("#"+location).html("<font color = 'green'>Password strength <b>VERY STRONG</b></font> <img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#phoneno").focus();
		}
		
		return true;	
	}
}

//Function to prompt
function promptAction(question, url)
{
	var message = question;
	
	if(window.confirm(message))
	{
		window.location.href = url;	
	}
}


//Function to add POLICE Users
function addoreditPOLICEUser(names, username, password1, phoneno, editid, location)
{
	names = $("#"+names).val();
	
	username = $("#"+username).val();
	
	password1 = $("#"+password1).val();
	
	phoneno = $("#"+phoneno).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditpoliceusers.php",
	{ names: names, username: username, password1: password1, phoneno: phoneno, editid: editid },
		function(data){
		
		if(data == 20)
		{
			$("#"+location).html("<font color = \"green\">POLICE Officer <b>"+names+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#names").val("");
			
			$("#username").val("");
			
			$("#username_error").html("");
			
			$("#password1").val("");
			
			$("#password2").val("");
			
			$("#password_error").html("");
			
			$("#phoneno").val("");
		}
		else if(data == 25)
		{
			$("#"+location).html("<font color = \"red\">Unable to add POLICE Officer <b>"+names+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else if(data == 30)
		{
			$("#"+location).html("<font color = \"green\">Changes made to POLICE Officer <b>"+names+"</b>, successfully saved </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else if(data == 35)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to POLICE Officer <b>"+names+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Username <b>"+username+"</b> already in use, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#names").focus();
		}
	}
	);
	
	return false;
}

//Function to display list
function displayThis(resultid, title, location)
{
	subsresult = $('input[name='+location+']').attr('checked');
	
	if(subsresult == true)
	{
		task = "Allow system to display entry for ";	
	}
	else
	{
		task = "Allow system to hide entry for ";	
	}
	
	var message = task+" - "+title+" on the website?";
	
	if(window.confirm(message))
	{
		$.post("../other_files/setthisitem.php",
		{ subsresult: subsresult, resultid: resultid },
			function(data){
				
			alert(data);//$("#"+location).html(data);
		}
		);
		
		return true;
	}
	
	return false;
}

//function to select currency
function selectionCurrency(currencyid, currencyname)
{
	var message = "Set - "+currencyname+" - as the default currency?";
	
	if(window.confirm(message))
	{
		$.post("../other_files/inc_setcurrency.php",
		{ currencyid: currencyid},
			function(data){
				
			alert(data);
		}
		);
		
		return true;
	}	
	
	return false;
}

//Function to add or edit currency
function addoreditCurrency(currency, currency_abbrev, currency_abbrev_position, symbol, symbol_position, editid, location)
{
	currency = $("#"+currency).val();
	
	currency_abbrev = $("#"+currency_abbrev).val();
	
	currency_abbrev_position = $("#"+currency_abbrev_position).val();
	
	symbol = $("#"+symbol).val();
	
	symbol_position = $("#"+symbol_position).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#32B444\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditcurrency.php",
	{ currency: currency, currency_abbrev: currency_abbrev, currency_abbrev_position: currency_abbrev_position, symbol: symbol, symbol_position: symbol_position, editid: editid },
		function(data){
		
		if(data == 100)
		{
			$("#"+location).html("<font color = \"green\">Currency <b>"+currency+"</b> added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#currency").focus();
			
			$("#currency").val("");	
			
			$("#currency_abbrev").val("");
			
			$("#symbol").val("");	
			
		}
		else if(data == 120)
		{
			$("#"+location).html("<font color = \"red\">Unable to add Currency <b>"+currency+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else if(data == 140)
		{
			$("#"+location).html("<font color = \"red\">Currency <b>"+currency+"</b> is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else if(data == 200)
		{
			$("#"+location).html("<font color = \"green\">Changes made to Currency <b>"+currency+"</b> saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();		
			
		}
		else if(data == 220)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to Currency <b>"+currency+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else if(data == 240)
		{
			$("#"+location).html("<font color = \"red\">Currency <b>"+currency+"</b> is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Other error, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}

//function to select year
function selectionYear(yearid, yearname)
{
	var message = "Set - "+yearname+" - as the default year?";
	
	if(window.confirm(message))
	{
		$.post("../other_files/inc_setyear.php",
		{ yearid: yearid},
			function(data){
				
			alert(data);
		}
		);
		
		return true;
	}	
	
	return false;
}

//Function to add or edit years
function addoreditYear(year, editid, location)
{
	year = $("#"+year).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#32B444\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoredityear.php",
	{ year: year, editid: editid},
		function(data){
			if(data == 100)
		{
			$("#"+location).html("<font color = \"green\">Year <b>"+year+"</b> added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#year").focus();
			
			$("#year").val("");		
			
		}
		else if(data == 120)
		{
			$("#"+location).html("<font color = \"red\">Unable to add Year <b>"+year+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else if(data == 140)
		{
			$("#"+location).html("<font color = \"red\">Year <b>"+year+"</b> is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else if(data == 200)
		{
			$("#"+location).html("<font color = \"green\">Changes made to Year <b>"+year+"</b> saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();		
			
		}
		else if(data == 220)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to Year <b>"+year+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else if(data == 240)
		{
			$("#"+location).html("<font color = \"red\">Year <b>"+year+"</b> is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#providercode").focus();
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Other error, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}

//Function
function addoreditPaymentDurations(names, duration, editid, location)
{
	names = $("#"+names).val();
	
	duration = $("#"+duration).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#32B444\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditpdurations.php",
	{ names: names, duration: duration, editid: editid},
		function(data){
			if(data == 100)
		{
			$("#"+location).html("<font color = \"green\">Payment Duration <b>"+names+"</b> added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#names").focus();
			
			$("#names").val("");
			
			$("#duration").val("");		
			
		}
		else if(data == 120)
		{
			$("#"+location).html("<font color = \"red\">Unable to add Payment Duration <b>"+names+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else if(data == 140)
		{
			$("#"+location).html("<font color = \"red\">Payment Duration <b>"+names+"</b> is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else if(data == 200)
		{
			$("#"+location).html("<font color = \"green\">Changes made to Payment Duration <b>"+names+"</b> saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 220)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to Payment Duration <b>"+names+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 240)
		{
			$("#"+location).html("<font color = \"red\">Payment Duration <b>"+names+"</b> is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Other error, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}

//Function
function addoreditPaymentRates(durationid, paymentrate, editid, location)
{
	durationid = $("#"+durationid).val();
	
	paymentrate = $("#"+paymentrate).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#32B444\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditprates.php",
	{ durationid: durationid, paymentrate: paymentrate, editid: editid},
		function(data){
			if(data == 100)
		{
			$("#"+location).html("<font color = \"green\">Payment Rate added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#durationid").focus();
			
			$("#paymentrate").val("");	
			
		}
		else if(data == 120)
		{
			$("#"+location).html("<font color = \"red\">Unable to add Payment Rate, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 140)
		{
			$("#"+location).html("<font color = \"red\">Payment Rate is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 200)
		{
			$("#"+location).html("<font color = \"green\">Changes made to Payment Rate saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 220)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to Payment Rate, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 240)
		{
			$("#"+location).html("<font color = \"red\">Payment Rate is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Other error, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}


//Function to add or edit exchange rates
function addoreditExchangeRates(fromid, toid, monthid, amount, editid, location)
{
	fromid = $("#"+fromid).val();
	
	toid = $("#"+toid).val();
	
	monthid = $("#"+monthid).val();
	
	amount = $("#"+amount).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#32B444\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditexrates.php",
	{ fromid: fromid, toid: toid, monthid: monthid, amount: amount, editid: editid},
		function(data){
			if(data == 100)
		{
			$("#"+location).html("<font color = \"green\">Exchange Rate added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#fromid").focus();
			
			$("#amount").val("");	
			
		}
		else if(data == 120)
		{
			$("#"+location).html("<font color = \"red\">Unable to add Exchange Rate, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 140)
		{
			$("#"+location).html("<font color = \"red\">Exchange Rate is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 200)
		{
			$("#"+location).html("<font color = \"green\">Changes made to Exchange Rate saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 220)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to Exchange Rate, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 240)
		{
			$("#"+location).html("<font color = \"red\">Exchange Rate is already registered </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else if(data == 300)
		{
			$("#"+location).html("<font color = \"red\">From and To Exchange Rates are the same </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Other error, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}

//Function
function saveWebPageContent(task, title, content, editid, location)
{
	task = $("#"+task).val();
	
	title = $("#"+title).val();
	
	content = $("#"+content).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_savepages.php",
	{ task: task, title: title, content: content, editid: editid},
		function(data){
		
		if(task == 1)
		{
			if(data == 100)
			{
				$("#"+location).html("<font color = \"green\">Changes saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			}
			else
			{
				$("#"+location).html("<font color = \"red\">Unable to save changes, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			}
		}
		else
		{
			if(data == 20)
			{
				$("#"+location).html("<font color = \"green\">FAQ added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
				$("#title").val("");
				
				$("#content").val("");
			}
			else if(data == 22)
			{
				$("#"+location).html("<font color = \"red\">Unable to add FAQ, please retry </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			}
			else if(data == 30)
			{
				$("#"+location).html("<font color = \"green\">Changes saved successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			}
			else if(data == 32)
			{
				$("#"+location).html("<font color = \"red\">Unable to save changes, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			}
			else
			{
				$("#"+location).html("<font color = \"red\">Unhandled error </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
				$("#names").focus();
			}
		}
	}
	);
	
	return false;
}

//Function to find transactions
function findMyTransaction(search_q, search_l, location)
{
	search_q = $("#"+search_q).val();
	
	search_l = $("#"+search_l).val();
	
	$("#texthide").html("");
	
	$("#texthide2").html("");
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_findrefno.php",
	{ search_q: search_q, search_l: search_l },
		function(data){
		
		$("#"+location).html(data);
	}
	);
	
	return false;	
}