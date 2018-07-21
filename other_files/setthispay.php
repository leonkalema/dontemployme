<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");;
	
	///DATA
	$durationid = $_POST['durationid'];
	
	$startdate = $_POST['startdate'];
	
	$timexplode = explode("/", $startdate, 4);	
	
	$sday = $timexplode[1];
	
	$smonth = $timexplode[0];
	
	$syear = $timexplode[2];
	
	$startstamp = mktime(0, 0, 0, $smonth, $sday, $syear);
	
	$thistime = mktime();
	
	mysql_query("INSERT INTO site_payments (userid, durationid, refno, status, startdate, date_posted) VALUES ('".$_SESSION['ssvid']."', '".$durationid."', '".$_SESSION['refno']."', 0, '".$startstamp."', '".$thistime."')");

?>