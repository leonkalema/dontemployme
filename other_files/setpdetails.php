<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");;
	
	///DATA
	$durationid = $_POST['durationid'];
	
	$thistime = mktime();
	
	mysql_query("INSERT INTO site_payments (userid, durationid, refno, status, date_posted) VALUES ('".$_SESSION['ssvid']."', '".$durationid."', '".$_SESSION['refno']."', 0, '".$thistime."')");
	
	$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
	
	//Return the cost, item name (ref no), 
	$paymentcost = mysql_fetch_array(mysql_query("SELECT paymentrate FROM payment_rates WHERE durationid = '".$durationid."'")); 
	
	$duration = mysql_fetch_array(mysql_query("SELECT names FROM payment_durations WHERE id = '".$durationid."'")); 
	
	$thiscost = "";
	
	if($currency['currency_abbrev_position'] == 1)
	{
		$prev = $currency['currency_abbrev'];
	}
		
	if($currency['symbol_position'] == 1)
	{
		$prev =  " ".$currency['symbol'];
	}
		
	$cost = " ".number_format($paymentcost['paymentrate'], "0", "", ","); 
		
	if($currency['symbol_position'] == 2)
	{
		$after =  $currency['symbol'];
	}
		
	if($currency['currency_abbrev_position'] == 2)
	{
		$after =  $currency['currency_abbrev'];
	}
	
	$rates = $currency['currency_abbrev'].$prev.$cost.$after;
	
	$text = $duration['names']." at a cost of  ".$rates;
	
	echo $_SESSION['refno']." --- ".$paymentcost[0]." --- ".$text;

?>