<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data 
	$names = inputCleaner($_POST['names']);
	
	$biodata = nl2br(mysql_real_escape_string($_POST['biodata']));
	
	$positionheld = inputCleaner($_POST['positionheld']);
	
	$phoneno = inputCleaner($_POST['phoneno']);
	
	$hrcomment = nl2br(mysql_real_escape_string($_POST['hrcomment']));
	
	$editid = inputCleaner($_POST['editid']);
	
	$thistime = mktime();
	
	$noid = 0;
	
	$randomid = getThisRand();
	
	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM my_list WHERE userid = '".$_SESSION['ssvid']."' && names = '".$names."'");
	
		if(mysql_num_rows($qry) == 0) 	
		{
			$insert = mysql_query("INSERT INTO my_list (userid, origin, randomid, names, biodata, detail1, detail2, phoneno, status, date_posted) VALUES ('".$_SESSION['ssvid']."', 1, '".$randomid."', '".$names."', '".$biodata."', '".$positionheld."', '".$hrcomment."', '".$phoneno."', 0, '".$thistime."')");
				
			if($insert)
			{
				$insertid = base64_encode(mysql_insert_id());
				
				echo "20-".$insertid;
			}
			else
			{
				echo "22-".$noid;	
			}	
		}
		else
		{
			echo "24-".$noid;	
		}
	}
	else
	{
		
	}
?>