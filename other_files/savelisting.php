<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	$personid = $_POST['personid'];
	
	$paymentid = $_POST['paymentid'];
	
	$paymentstatus = $_POST['paymentstatus'];
	
	$thistime = mktime();
	
	$startdate = $_POST['startdate'];
	
	$timexplode = explode("/", $startdate, 4);	
	
	$sday = $timexplode[1];
	
	$smonth = $timexplode[0];
	
	$syear = $timexplode[2];
	
	//Get the dduration
	
	$qry = mysql_query("SELECT id FROM running_list WHERE userid = '".$_SESSION['ssvid']."' && personid = '".$personid."'");
	
	if(mysql_num_rows($qry) == 0)
	{
		$paymentinfo = mysql_fetch_array(mysql_query("SELECT d.duration FROM payment_durations d, site_payments p WHERE d.id = p.durationid && p.id = '".$paymentid."'"));
	
		$smonthend = $timexplode[0] + $paymentinfo[0];
		
		$startstamp = mktime(0, 0, 0, $smonth, $sday, $syear);
		
		$endstamp = mktime(0, 0, 0, $smonthend, $sday, $syear);
		
		$insert = mysql_query("INSERT INTO running_list (userid, paymentid, personid, startdate, enddate, date_posted) VALUES ('".$_SESSION['ssvid']."', '".$paymentid."', '".$personid."', '".$startstamp."', '".$endstamp."', '".$thistime."')");
		
		if($insert)
		{
			mysql_query("UPDATE site_payments SET inuse = 1 WHERE userid = '".$_SESSION['ssvid']."' && id = '".$paymentid."'");
			
			mysql_query("UPDATE persons_list SET status = 1 WHERE id = '".$personid."'");
			
			echo 100;	
		}
		else
		{
			echo 200;
		}
	}
	else
	{
		echo 300;	
	}
	
?>