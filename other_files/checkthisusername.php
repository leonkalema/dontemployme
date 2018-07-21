<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$username = inputCleaner($_POST['username']);
	
	$qry = mysql_query("SELECT id FROM users WHERE usern = '".$username."'");
	
	if(strlen($username) > 5)
	{
		if(mysql_num_rows($qry) == 0)
		{
			echo 100;	
		}
		else
		{
			echo 80;
		}
	}
	else
	{
		echo 60;
	}
?>