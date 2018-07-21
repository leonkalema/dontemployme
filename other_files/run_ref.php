<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");

	//echo "<pre>"; print_r($_SESSION);
	
	if($_SESSION['refno'] == "")
	{
		$random = mt_rand(0,1987654320);
		$randomno = substr($random,0,6);
		$order = "DEM"."/".date("Y")."-".$randomno;	
				
		//Check if Order Number doesnt exist
		$qry = mysql_query("SELECT refno FROM site_payments WHERE refno = '".$order."'");
			
		if(mysql_num_rows($qry) == 0)
		{
			$orderno = $order;
			
			$_SESSION['refno'] = $orderno;
					
			echo  $orderno;
		}
		else
		{
			$random = mt_rand(0,1987654320);
			$randomno = substr($random,0,6);
			$order = "DEM"."/".date("Y")."-".$randomno;
			$orderno = $order;
			
			$_SESSION['refno'] = $orderno;
						
			echo  $orderno;
				
		}
	}
	else
	{
		echo $_SESSION['refno'];
	}
	
?>