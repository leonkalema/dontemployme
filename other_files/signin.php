<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$use = inputCleaner($_POST['user']);
	
	$pass = inputCleaner($_POST['pass']);
	
	$qry = mysql_query("SELECT id, urights, ustatus FROM users WHERE usern = '".$use."' && passwd = '".sha1($pass)."'");
	
	if(mysql_num_rows($qry) > 0)
	{
		$user = mysql_fetch_array($qry);
		
		if($user['ustatus'] != 0)
		{
			$_SESSION['ssvid'] = $user['id'];
			
			$_SESSION['ssvsec'] = $user['urights'];
			
			//Get default year
			$year = mysql_fetch_array(mysql_query("SELECT id FROM year WHERE activeyear = 1"));
			
			//Get currency
			$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
			
			$_SESSION['yid'] = $year[0];
			
			$_SESSION['currency'] = $currency['currency'];
			
			$_SESSION['currency_abbrev'] = $currency['currency_abbrev'];
			
			$_SESSION['yid'] = $year[0];
			
			$_SESSION['yid'] = $year[0];
			
			if($user['urights'] == 800)
			{
				$_SESSION['ssnames'] = "Website Administrator";
				
				echo 3;
			}
			elseif($user['urights'] == 700)
			{
				$getuserinfo = mysql_fetch_array(mysql_query("SELECT names, phoneno FROM user_accounts_police WHERE userid = '".$user['id']."'"));
				
				$_SESSION['ssnames'] = $getuserinfo['names'];
					
				$_SESSION['phoneno'] = $getuserinfo['phoneno'];
				
				echo 4;
			}
			else
			{
				$getuserinfo = mysql_fetch_array(mysql_query("SELECT companynames, contactnames, phoneno FROM user_accounts_companies WHERE userid = '".$user['id']."'")) or die(mysql_error());
					
				$_SESSION['compnames'] = $getuserinfo['companynames'];
				
				$_SESSION['ssnames'] = $getuserinfo['contactnames'];
					
				$_SESSION['phoneno'] = $getuserinfo['phoneno'];
				
				echo 4;
			}	
		}
		else
		{
			echo 9;	
		}
	}
	else
	{
		echo 10;
	}

?>