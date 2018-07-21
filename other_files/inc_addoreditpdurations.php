<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	$names = inputCleaner($_POST['names']);
	
	$duration = inputCleaner($_POST['duration']);
	
	$editid = inputCleaner($_POST['editid']);

	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM payment_durations WHERE names = '".$names."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$insert = mysql_query("INSERT INTO payment_durations (names, duration) VALUES ('".$names."', '".$duration."')");
			
			if($insert)
			{
				echo 100;
			}
			else
			{
				echo 120;
			}
		}
		else
		{
			echo 140;
		}
	}
	else
	{
		$qry = mysql_query("SELECT id FROM payment_durations WHERE names = '".$names."' && id != '".$editid."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$update = mysql_query("UPDATE payment_durations SET names = '".$names."', duration = '".$duration."' WHERE id = '".$editid."'");
			
			if($update)
			{
				echo 200;
			}
			else
			{
				echo 220;
			}
		}
		else
		{
			echo 240;
		}	
	}
?>