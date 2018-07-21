<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");;
	
	///DATA
	$subsresult = $_POST['subsresult'];
	
	$id = $_POST['resultid'];
	
	if($subsresult == "true")
	{
		$feat = 1;
	}
	else
	{
		$feat = 0;
	}
	
	$update = mysql_query("UPDATE my_list SET status = '".$feat."' WHERE id = '".$id."'");
	
	if($update)
	{
		echo "Successful";
	}
	else
	{
		echo "Unsuccessful, please retry!";
	}

?>