<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	
	//Form data
	$id = $_POST['currencyid'];
	
	mysql_query("UPDATE currency_setup SET inuse = 0");
	
	$update = mysql_query("UPDATE currency_setup SET inuse = 1 WHERE id = '".$id."'");
	
	if($update)
	{
		echo "Currency selection successful";
	}
	else
	{
		echo "Unable to complete process, please retry!";
	}
	
?>