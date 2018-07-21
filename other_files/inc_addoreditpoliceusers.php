<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$names = inputCleaner($_POST['names']);
	
	$username = inputCleaner($_POST['username']);
	
	$password1 = inputCleaner($_POST['password1']);
	
	$phoneno = inputCleaner($_POST['phoneno']);
	
	$editid = inputCleaner($_POST['editid']);
	
	$thistime = mktime();
	
	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM users WHERE usern = '".$username."'");
	
		if(mysql_num_rows($qry) == 0) 	
		{
			$insert = mysql_query("INSERT INTO users (usern, passwd, urights, ustatus) VALUES ('".$username."', '".sha1($password1)."', 700, 1)");
				
			if($insert)
			{
				$inserid = mysql_insert_id();
				
				mysql_query("INSERT INTO user_accounts_police (userid, names, phoneno, date_joined) VALUES ('".$inserid."', '".$names."', '".$phoneno."', '".$thistime."')");
			
				echo 20;
			}
			else
			{
				echo 25;	
			}	
		}
		else
		{
			echo 40;	
		}
	}
	else
	{
		$qry = mysql_query("SELECT id FROM users WHERE usern = '".$username."' && id != '".$editid."'");
	
		if(mysql_num_rows($qry) == 0) 	
		{
			$update = mysql_query("UPDATE user_accounts_police SET names = '".$names."', phoneno = '".$phoneno."' WHERE userid = '".$editid."'");
				
			if($update)
			{
				if($password1 != "")
				{
					mysql_query("UPDATE users SET passwd = '".sha1($password1)."' WHERE id = '".$editid."'");
				}
			
				echo 30;
			}
			else
			{
				echo 35;	
			}	
		}
		else
		{
			echo 40;	
		}
	}


?>