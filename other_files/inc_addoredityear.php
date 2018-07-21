<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	$year = inputCleaner($_POST['year']);
	
	$editid = inputCleaner($_POST['editid']);

	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM year WHERE names = '".$year."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$insert = mysql_query("INSERT INTO year (names) VALUES ('".$year."')");
			
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
		$qry = mysql_query("SELECT id FROM year WHERE names = '".$year."' && id != '".$editid."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$update = mysql_query("UPDATE year SET names = '".$year."' WHERE id = '".$editid."'");
			
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