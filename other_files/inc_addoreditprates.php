<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	$durationid = inputCleaner($_POST['durationid']);
	
	$paymentrate = inputCleaner($_POST['paymentrate']);
	
	$editid = inputCleaner($_POST['editid']);

	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM payment_rates WHERE durationid = '".$durationid."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$insert = mysql_query("INSERT INTO payment_rates (durationid, paymentrate) VALUES ('".$durationid."', '".$paymentrate."')");
			
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
		$qry = mysql_query("SELECT id FROM payment_rates WHERE durationid = '".$durationid."' && id != '".$editid."'");
		
		if(mysql_num_rows($qry) == 0)
		{
			$update = mysql_query("UPDATE payment_rates SET durationid = '".$durationid."', paymentrate = '".$paymentrate."' WHERE id = '".$editid."'");
			
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