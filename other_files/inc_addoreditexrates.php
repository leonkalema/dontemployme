<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	$fromid = inputCleaner($_POST['fromid']);
	
	$toid = inputCleaner($_POST['toid']);
	
	$monthid = inputCleaner($_POST['monthid']);
	
	$amount = inputCleaner($_POST['amount']);
	
	$editid = inputCleaner($_POST['editid']);
	
	$thistime = mktime();

	if($fromid != $toid)
	{
		if($editid == 0)
		{
			$qry = mysql_query("SELECT id FROM exchange_rates WHERE fromid = '".$fromid."' && toid = '".$toid."' && yearid = '".$_SESSION['yid']."' && monthid = '".$monthid."' && amount = '".$amount."'");
			
			if(mysql_num_rows($qry) == 0)
			{
				$insert = mysql_query("INSERT INTO exchange_rates (fromid, toid, yearid, monthid, amount, date_posted) VALUES ('".$fromid."', '".$toid."', '".$_SESSION['yid']."', '".$monthid."', '".$amount."', '".$thistime."')");
				
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
			$qry = mysql_query("SELECT id FROM exchange_rates WHERE fromid = '".$fromid."' && toid = '".$toid."' && amount = '".$amount."' && yearid = '".$_SESSION['yid']."' && monthid = '".$monthid."' && id != '".$editid."'");
			
			if(mysql_num_rows($qry) == 0)
			{
				$update = mysql_query("UPDATE exchange_rates SET  fromid = '".$fromid."', toid = '".$toid."', yearid = '".$_SESSION['yid']."', monthid = '".$monthid."', amount = '".$amount."' monthid = '".$monthid."' WHERE id = '".$editid."'");
				
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
	}
	else
	{
		echo 300;
	}
?>