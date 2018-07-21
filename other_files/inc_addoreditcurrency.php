<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$currency = inputCleaner($_POST['currency']);
	
	$currency_abbrev = inputCleaner($_POST['currency_abbrev']);
	
	$currency_abbrev_position = inputCleaner($_POST['currency_abbrev_position']);
	
	$symbol = $_POST['symbol'];
	
	$symbol_position = inputCleaner($_POST['symbol_position']);
	
	$editid = inputCleaner($_POST['editid']);
	
	
	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM currency_setup WHERE currency = '".$currency."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$insert = mysql_query("INSERT INTO currency_setup (currency, currency_abbrev, currency_abbrev_position, symbol, symbol_position) VALUES ('".$currency."', '".$currency_abbrev."', '".$currency_abbrev_position."', '".$symbol."', '".$symbol_position."')");
			
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
		$qry = mysql_query("SELECT id FROM currency_setup WHERE currency = '".$currency."' && id != '".$editid."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$update = mysql_query("UPDATE currency_setup SET currency = '".$currency."', currency_abbrev = '".$currency_abbrev."', currency_abbrev_position = '".$currency_abbrev_position."', symbol = '".$symbol."', symbol_position = '".$symbol_position."' WHERE id = '".$editid."'");
			
			if($update)
			{
				echo 200;
			}
			else
			{
				echo 210;
			}
		}
		else
		{
				echo 240;
		}	
	}
	
?>