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

//function to check for the file type of uploaded image
function checkImage(param1, param2)
{
	var s_pic = $("#"+param1).val();
	
	var xxx = s_pic.split(".");
	
	if(xxx[1] != "jpg" && xxx[1] != "pjpeg" && xxx[1] != "jpeg" && xxx[1] != "gif")
	{
		$("#"+param2).html("<font color = 'red'>Invalid file browsed, please browse for file with types .gif or or .jpg </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
		document.getElementById("user_img").focus();
	}
	else
	{
		$("#"+param2).html("<font color = 'green'>File format is supported </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
	}
	
	return false;
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

//function to check for the file type of uploaded image
function checkImage(param1,param2)
{
	var s_pic = document.getElementById(param1).value; 
	
	var xxx = s_pic.split(".");
	
	if(xxx[1] != "jpg" && xxx[1] != "gif" && xxx[1] != "pjpeg" && xxx[1] != "jpeg")
	{
		document.getElementById(param2).innerHTML = "<font color = 'red'>Invalid file browsed, please browse for file of types .gif, .jpg OR .jpeg</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
		document.getElementById(param1).focus();
	}
	else
	{
		document.getElementById(param2).innerHTML = "<font color = 'green'>Picture file format is supported </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
	}
	
	return false;
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

//Function to add HR Employee
function addoreditHREmployee(names, biodata, positionheld, phoneno, hrcomment, editid, location)
{
	names = $("#"+names).val();
	
	biodata = $("#"+biodata).val();
	
	positionheld = $("#"+positionheld).val();
	
	phoneno = $("#"+phoneno).val();
	
	hrcomment = $("#"+hrcomment).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoredithremp1.php",
	{ names: names, biodata: biodata, positionheld: positionheld, phoneno: phoneno, hrcomment: hrcomment, editid: editid },
		function(data){
		
		thisdata = data.split("-");
		
		if(thisdata[0] == 20)
		{
			//$("#"+location).html("<font color = \"green\">HR Employee <b>"+names+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'><br>Click here to <a href=\"../user_accounts/upload_picture.php?p="+thisdata[1]+"\" class=\"links\" title=\"Add Picture Now\">Add Picture Now</a>");
			$("#"+location).html("<font color = \"green\">HR Employee <b>"+names+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'><br>Click here to <a href=\"#\" class=\"links\" title=\"Add Picture Now\">Add Picture Now</a>");
		
			$("#names").val("");
			
			$("#biodata").val("");
			
			$("#positionheld").val("");
			
			$("#phoneno").val("");
			
			$("#hrcomment").val("");
		}
		else if(thisdata[0] == 30)
		{
			$("#"+location).html("<font color = \"green\">Changes made to HR Employee <b>"+names+"</b>, successfully saved </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else
		{
			$("#"+location).html("<font color = \"green\">Unable to add HR Employee <b>"+names+"</b>, please retry </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#names").focus();
		}
	}
	);
	
	return false;
}

//Function to add WANTED Person
function addoreditWANTEDPerson(names, biodata, casefileno, crime, editid, location)
{
	names = $("#"+names).val();
	
	biodata = $("#"+biodata).val();
	
	casefileno = $("#"+casefileno).val();
	
	crime = $("#"+crime).val();
	
	editid = $("#"+editid).val();
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditwp1.php",
	{ names: names, biodata: biodata, casefileno: casefileno, crime: crime, editid: editid },
		function(data){
		
		thisdata = data.split("-");
		
		if(thisdata[0] == 20)
		{
			//$("#"+location).html("<font color = \"green\">HR Employee <b>"+names+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'><br>Click here to <a href=\"../user_accounts/upload_picture.php?p="+thisdata[1]+"\" class=\"links\" title=\"Add Picture Now\">Add Picture Now</a>");
			$("#"+location).html("<font color = \"green\">WANTED Person <b>"+names+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'><br>Click here to <a href=\"#\" class=\"links\" title=\"Add Picture Now\">Add Picture Now</a>");
		
			$("#names").val("");
			
			$("#biodata").val("");
			
			$("#casefileno").val("");
			
			$("#crime").val("");
		}
		else if(thisdata[0] == 30)
		{
			$("#"+location).html("<font color = \"green\">Changes made to WANTED Person <b>"+names+"</b>, successfully saved </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else
		{
			$("#"+location).html("<font color = \"green\">Unable to add WANTED Person <b>"+names+"</b>, please retry </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#names").focus();
		}
	}
	);
	
	return false;
}

//Function
function confirmPayment()
{
	durationid = $("#durationid").val();
	
	var message = "Proceed securely to PayPal Website to make payment?";
	
	if(window.confirm(message))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function savePayments(durationid)
{
	durationid = $("#"+durationid).val();
	
	$.post("../other_files/setpdetails.php",
	{ durationid: durationid },
		function(data){
				
			mydata = data.split("---");
				
			$("#L_NAME0").val(mydata[2]);
				
			$("#L_AMT0").val(mydata[1]);
				
			return false;
	}
	);	
}

//Function to add employee
function  addoreditThisPerson(fname, mname, lname, alias1, alias2, alias3, phoneno, race, tribe, pheight, haircolor, eyecolor, dateofbirth, spousename, fathername, mothername, parentsresidence, countryofbirth, placeofbirth, nationality, passportno, idcard, drivingpermit, address, streetaddress, city, parish, village, zone, occupation, qualification, university, secondaryschool, primaryschool, specialcourse, hrcomment, editid, location)
{
	gender = $('input:radio[name=gender]:checked').val();
	maritalstatus = $('input:radio[name=maritalstatus]:checked').val();
	sourceid = $("#sourceid").val();
	fname = $("#"+fname).val();
	mname = $("#"+mname).val();
	lname = $("#"+lname).val();
	alias1 = $("#"+alias1).val();
	alias2 = $("#"+alias2).val();
	alias3 = $("#"+alias3).val();
	phoneno = $("#"+phoneno).val();
	race = $("#"+race).val();
	tribe = $("#"+tribe).val();
	pheight = $("#"+pheight).val();
	haircolor = $("#"+haircolor).val();
	eyecolor = $("#"+eyecolor).val();
	dateofbirth = $("#"+dateofbirth).val();
	spousename = $("#"+spousename).val();
	fathername = $("#"+fathername).val();
	mothername = $("#"+mothername).val();
	parentsresidence = $("#"+parentsresidence).val();
	countryofbirth = $("#"+countryofbirth).val();
	placeofbirth = $("#"+placeofbirth).val();
	nationality = $("#"+nationality).val();passportno = $("#"+passportno).val();
	idcard = $("#"+idcard).val();
	drivingpermit = $("#"+drivingpermit).val();
	address = $("#"+address).val();
	streetaddress = $("#"+streetaddress).val();
	city = $("#"+city).val();
	parish = $("#"+parish).val();
	village = $("#"+village).val();
	zone = $("#"+zone).val();
	occupation = $("#"+occupation).val();
	qualification = $("#"+qualification).val();
	university = $("#"+university).val();
	secondaryschool = $("#"+secondaryschool).val();
	primaryschool = $("#"+primaryschool).val();
	specialcourse = $("#"+specialcourse).val();
	hrcomment = $("#"+hrcomment).val();
	editid = $("#"+editid).val();
	
	if(mname != "")
	{
		names = fname+" "+mname+" "+lname;
	}
	else
	{
		names = fname+" "+lname;
	}
	
	if(maritalstatus != 5)
	{
		if(spousename == null || spousename == "")
		{
			$("#"+location).html("<font color = \"red\">PERSONAL INFORMATION: Please enter name of spouse</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#spousename").focus();
			
			return false;
		}
	}
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_addoreditp1.php",
	{ gender:gender, maritalstatus: maritalstatus, sourceid: sourceid, fname: fname, mname: mname, lname: lname, alias1: alias1, alias2: alias2, alias3: alias3, phoneno: phoneno, race: race, tribe: tribe, pheight: pheight, haircolor: haircolor, eyecolor: eyecolor, dateofbirth: dateofbirth, spousename: spousename, fathername: fathername, mothername: mothername, parentsresidence: parentsresidence, countryofbirth: countryofbirth, placeofbirth: placeofbirth, nationality: nationality, passportno: passportno, idcard: idcard, drivingpermit: drivingpermit, address: address, streetaddress: streetaddress, city: city, parish: parish, village: village, zone: zone, occupation: occupation, qualification: qualification, university: university, secondaryschool: secondaryschool, primaryschool: primaryschool, specialcourse: specialcourse, hrcomment: hrcomment, editid: editid },
		function(data){
		thisdata = data.split("-");
		
		if(thisdata[0] == 20)
		{
			//$("#"+location).html("<font color = \"green\">HR Employee <b>"+names+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'><br>Click here to <a href=\"../user_accounts/upload_picture.php?p="+thisdata[1]+"\" class=\"links\" title=\"Add Picture Now\">Add Picture Now</a>");
			$("#"+location).html("<font color = \"green\">Person <b>"+fname+" "+lname+"</b>  added successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'><br>Click here to <a href=\"../user_accounts/hr_employee.php?p="+thisdata[1]+"\" class=\"links\" title=\"Add Picture Now\">Add Picture Now</a>");
		
			$("#fname").val("");
			$("#mname").val("");
			$("#lname").val("");
			$("#alias1").val("");
			$("#alias2").val("");
			$("#alias3").val("");
			$("#phoneno").val("");
			$("#race").val("");
			$("#tribe").val("");
			$("#pheight").val("");
			$("#haircolor").val("");
			$("#eyecolor").val("");
			$("#dateofbirth").val("");
			$("#spousename").val("");
			$("#fathername").val("");
			$("#mothername").val("");
			$("#parentsresidence").val("");
			$("#countryofbirth").val("");
			$("#placeofbirth").val("");
			$("#nationality").val("");
			$("#idcard").val("");
			$("#drivingpermit").val("");
			$("#address").val("");
			$("#streetaddress").val("");
			$("#city").val("");
			$("#parish").val("");
			$("#village").val("");
			$("#zone").val("");
			$("#occupation").val("");
			$("#qualification").val("");
			$("#university").val("");
			$("#secondaryschool").val("");
			$("#primaryschool").val("");
			$("#specialcourse").val("");
			$("#hrcomment").val("");
		}
		else if(thisdata[0] == 24)
		{
			$("#"+location).html("<font color = \"red\">Unable to add Person <b>"+names+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#fname").focus();
		}
		else if(thisdata[0] == 28)
		{
			$("#"+location).html("<font color = \"red\">HR Employee with names <b>"+names+"</b> already added </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#fname").focus();
		}
		else if(thisdata[0] == 30)
		{
			$("#"+location).html("<font color = \"green\">Changes made to Person <b>"+names+"</b>, successfully saved </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else if(thisdata[0] == 34)
		{
			$("#"+location).html("<font color = \"red\">Unable to save changes made to Person <b>"+names+"</b>, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#fname").focus();
		}
		else if(thisdata[0] == 38)
		{
			$("#"+location).html("<font color = \"red\">HR Employee with names <b>"+names+"</b> already added </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#fname").focus();
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Error occured, kindly notifiy our webmaster through email helpdesk@dontemployme.com [ indicate what you were doing ] </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#fname").focus();
		}
	}
	);
	
	return false;
}

//Function to save listing
function savePaidListing(personid, paymentid, paymentstatus, startdate, location)
{
	personid = $("#"+personid).val();
	
	paymentid = $("#"+paymentid).val();
	
	paymentstatus = $("#"+paymentstatus).val();
	
	startdate = $("#"+startdate).val();
	
	names = $("#names").val();
	
	var message = "Allow system to list HR Employee "+names+"?";
	
	if(window.confirm(message))
	{
		if(paymentstatus == 1)
		{
			$.post("../other_files/savelisting.php",
			{ personid: personid, paymentid: paymentid, paymentstatus: paymentstatus, startdate: startdate },
				function(data){
						
				if(data == 100)
				{
					$("#"+location).html("<font color = \"green\">HR Employee "+names+" listed successfully </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
				
					$("#startdate").val("");
				}
				else if(data == 300)
				{
					$("#"+location).html("<font color = \"red\">HR Employee "+names+" already listed listed </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
				
					$("#startdate").val();
				}
				else
				{
					$("#"+location).html("<font color = \"red\">Unable to save listing, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
				}
					
				return false;
			}
			);
			
			return false;
		}
		else
		{
			$("#"+location).html("<font color = \"red\">You do not have any payments to use </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#paymentid").focus();
			
			return false;
		}
	}
	else
	{
		return false;
	}
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