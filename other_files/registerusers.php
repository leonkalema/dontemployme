<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$companynames = inputCleaner($_POST['companynames']);
	
	$contactnames = inputCleaner($_POST['contactnames']);
	
	$username = inputCleaner($_POST['username']);
	
	$password1 = inputCleaner($_POST['password1']);
	
	$address = nl2br(mysql_real_escape_string($_POST['address']));
	
	$phoneno = inputCleaner($_POST['phoneno']);
	
	$emailid = inputCleaner($_POST['emailid']);
	
	$thistime = mktime();
	
	$qry = mysql_query("SELECT id FROM users WHERE usern = '".$username."'");
	
	if(mysql_num_rows($qry) == 0) 	
	{
		$insert = mysql_query("INSERT INTO users (usern, passwd, urights, ustatus) VALUES ('".$username."', '".sha1($password1)."', 600, 0)");
			
		if($insert)
		{
			$inserid = mysql_insert_id();
			
			mysql_query("INSERT INTO user_accounts_companies (userid, companynames, contactnames, address, phoneno, emailid, date_joined) VALUES ('".$inserid."', '".$companynames."', '".$contactnames."', '".$address."', '".$phoneno."', '".$emailid."', '".$thistime."')");
		
			//Email setup
			$to = $emailid;
			
			$names = "www.dontemployme.com - Account Registration";
			
			$from = "info@dontemployme.com";
			
			$subject = "RE: Account Registration at www.dontemployme.com";
			
			$headers = "From: \"".$names."\" <".$email.">\n"; 
			
			$headers .= "Return-Path: <".$email.">\n"; 
			
			$headers .= "MIME-Version: 1.0\n"; 
			
			$headers .= "Content-Type: text/HTML; charset=ISO-8859-1\n";
			
			$message = 
"Dear ".$companynames.",

Thank you,

www.dontemployme.com Team

";
			
			$body = $message."\r\n";
			
			@mail($to, $subject, $body, $headers);
			
			echo 10;
		}
		else
		{
			echo 20;	
		}	
	}

?>