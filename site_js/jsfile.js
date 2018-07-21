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

//Function
function EmptyNoAction(param1)
{
	var itemid = $("#"+param1).val();
	
	if(itemid == null || itemid == "")
	{
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
		
			$("#username").focus();
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Username <b>"+username+"</b> already in use </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		
			$("#username").focus();
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
			
			$("#address").focus();
		}
		else if(len > 6 && len <= 12)
		{
			$("#"+location).html("<font color = 'green'>Password strength <b>STRONG</b></font> <img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#address").focus();
		}
		else
		{
			$("#"+location).html("<font color = 'green'>Password strength <b>VERY STRONG</b></font> <img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#address").focus();
		}
		
		return true;	
	}
}

//Function to check eail addressses
function checkEmail(param1, param2)
{
	var email = document.getElementById(param1).value;
	
	if (echeck(email) == false)
	{
		document.getElementById(param1).value = "";
		
		document.getElementById(param1).focus();
		
		return false;
	}
	
	return true;
}

//Function
function echeck(str) 
{

	var at="@";
		
	var dot=".";
		
	var lat=str.indexOf(at);
		
	var lstr=str.length;
		
	var ldot=str.indexOf(dot);
		
	if (str.indexOf(at) == -1)
	{
	   document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
		   
	   return false;
	}

	if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr)
	{
	   document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
		   
	   return false;
	}

	if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr)
	{
	   document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
		
	    return false;
	}

	 if (str.indexOf(at,(lat+1)) != -1) 
	 {
	    document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
	
	    return false;
	 }

	 if (str.substring(lat-1,lat) == dot || str.substring(lat+1,lat+2) == dot)
	 {
	    document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
			
	    return false;
	 }

	 if (str.indexOf(dot,(lat+2)) == -1)
	 {
	    document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
		
	    return false;
	 }
		
	 if (str.indexOf(" ") != -1) 
	 {
	    document.getElementById("error_msg2").innerHTML = "<font color = 'red'>Invalid email address </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>";
		
	    return false;
	 }

	 return true;					
}

//function to register users
function registerUser(companynames, contactnames, username, password1, address, phoneno, emailid, location)
{
	companynames = $("#"+companynames).val();
	
	contactnames = $("#"+contactnames).val();
	
	username = $("#"+username).val();
	
	password1 = $("#"+password1).val();
	
	address = $("#"+address).val();
	
	phoneno = $("#"+phoneno).val();
	
	emailid = $("#"+emailid).val();
	
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/registerusers.php",
	{ companynames: companynames, contactnames: contactnames, username: username, password1: password1, address: address, phoneno: phoneno, emailid: emailid },
		function(data){
		
		if(data == 10)
		{
			$("#"+location).html("<font color = \"green\">Registered successfully - Pending Verification by Web Master </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			$("#companynames").val("");
			
			$("#contactnames").val("");
			
			$("#username").val("");
			
			$("#username_error").html("");
			
			$("#password1").val("");
			
			$("#password2").val("");
			
			$("#password_error").html("");
			
			$("#address").val("");
			
			$("#phoneno").val("");
			
			$("#emailid").val("");
			
			$("#emailcheck").html("");
		
		}
		else
		{
			$("#"+location).html("<font color = \"red\">Unable to register, please retry </font><img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}


//Login users
function signInUser(username, password, location)
{
	value1 = $("#"+username).val();
	
	value2 = $("#"+password).val();
	
	$("#"+location).html("<font color = \"#85B525\">Signing in . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/signin.php",
	{ user: value1, pass: value2},
		function(data){
		
		if(data == 3)
		{
			window.location.href = "../panel_area/index.php";
		}
		else if(data == 4)
		{
			window.location.href = "../user_accounts/index.php";
		}
		else if(data == 9)
		{
			$("#"+location).html("<font color = \"green\">Account Pending <b>Activation</b> by Web Master </font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else
		{
			$("#"+location).html("<font color = \"red\">INVALID username OR password</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}

//Send us a message
function sendMessage(names, email, message, security_txt, location)
{
	names = $("#"+names).val();
	email = $("#"+email).val();
	message = $("#"+message).val();
	security_txt = $("#"+security_txt).val();
		
	$("#"+location).html("<font color = \"#85B525\">Processing, please wait . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
		
	$.post("../other_files/inc_sendmessage.php",
	{ names: names, email: email, message: message, security_txt: security_txt },
		function(data){
			
		if(data == 60)
		{
			$("#"+location).html("<font color = 'green'>Message sent successfully!</font><img src='../images/yes.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
			
			document.getElementById("names").value = "";
			
			document.getElementById("email").value = "";
			
			document.getElementById("message").value = "";
			
			/*$.post("../other_files/my_captcha.php",
			{ security_txt: security_txt },
				function(data2){
				
				$("#reloadme").html(data2);
			}
			);*/
			
			document.getElementById("security_txt").value = "";
			
			window.setTimeout('location.reload()', 8000);
		}
		else if (data == 50)
		{
			$("#"+location).html("<font color = 'red'>Unable to send message!</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
		else
		{
			$("#"+location).html("<font color = 'red'>Incorrect security text entered!</font> <img src='../images/no.gif' name = 'img1' align = 'absmiddle' width='18' height = '18' alt='image'>");
		}
	}
	);
	
	return false;
}