<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$task = inputCleaner($_POST['task']);
	
	$title = inputCleaner($_POST['title']);
	
	$content = nl2br(mysql_real_escape_string($_POST['content']));
	
	$editid = inputCleaner($_POST['editid']);
	
	if($task == 1)
	{
		$update = mysql_query("UPDATE website_pages SET content = '".$content."' WHERE id = '".$editid."'");
		
		if($update)
		{
			echo 100;	
		}
		else
		{
			echo 200;
		}
	}
	else
	{
		if($editid == 0)
		{
			$qry = mysql_query("SELECT id FROM website_pages WHERE location = 'faqs' && title = '".$title."'");	
		
			if(mysql_num_rows($qry) == 0)
			{
				$insert = mysql_query("INSERT INTO website_pages (location, title, content) VALUES ('faqs', '".$title."', '".$content."')");
				
				if($insert)
				{
					echo 20;
				}
				else
				{
					echo 22;	
				}
			}
		}
		else
		{
			$qry = mysql_query("SELECT id FROM website_pages WHERE location = 'faqs' && title = '".$title."' && id != '".$editid."'");	
		
			if(mysql_num_rows($qry) == 0)
			{
				$update = mysql_query("UPDATE website_pages SET title = '".$title."', content = '".$content."' WHERE id = '".$editid."'");
				
				if($update)
				{
					echo 30;
				}
				else
				{
					echo 32;	
				}
			}
		}
	}
	
?>