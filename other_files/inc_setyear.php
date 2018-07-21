<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	
	//Form data
	$id = $_POST['yearid'];
	
	mysql_query("UPDATE year SET activeyear = 0");
	
	$update = mysql_query("UPDATE year SET activeyear = 1 WHERE id = '".$id."'");
	
	if($update)
	{
		echo "Year selection successful";
	}
	else
	{
		echo "Unable to complete process, please retry!";
	}
	
?>