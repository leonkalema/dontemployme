<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Delete currency
	if($_GET['dcur'])
	{
		$id = base64_decode($_GET['dcur']);
		
		mysql_query("DELETE FROM currency_setup WHERE id = '".$id."'");
		
		$url = "../panel_area/settings.php?task=currency&t=view";
		
		header("location: ".$url);
	}
	
	//Delete year
	if($_GET['dy'])
	{
		$id = base64_decode($_GET['dy']);
		
		mysql_query("DELETE FROM year WHERE id = '".$id."'");
		
		$url = "../panel_area/settings.php?task=year&t=view";
		
		header("location: ".$url);
	}
	
	//Delete payment duration
	if($_GET['ddur'])
	{
		$id = base64_decode($_GET['ddur']);
		
		mysql_query("DELETE FROM payment_durations WHERE id = '".$id."'");
		
		$url = "../panel_area/settings.php?task=durations&t=view";
		
		header("location: ".$url);
	}
	
	//Delete payment rate
	if($_GET['drat'])
	{
		$id = base64_decode($_GET['drat']);
		
		mysql_query("DELETE FROM payment_rates WHERE id = '".$id."'");
		
		$url = "../panel_area/settings.php?task=rates&t=view";
		
		header("location: ".$url);
	}
	
	//Delete exchange rates
	if($_GET['dex'])
	{
		$id = base64_decode($_GET['dex']);
		
		mysql_query("DELETE FROM exchange_rates WHERE id = '".$id."'");
		
		$url = "../panel_area/settings.php?task=exchange&t=view";
		
		header("location: ".$url);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: System Settings</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../site_css/cssfile.css" />
		<script type="text/javascript" language="javascript" src="../site_js/jquery.js">
        </script>
		<script type="text/javascript" language="javascript" src="../site_js/js.js">
        </script>
    </head>
    <body>
        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0">
            <tr>
            	<td align="center" style="background-color:#000;">
                	<table border="0" width="990px" cellpadding="0" cellspacing="0">
                    	<tr>
                        	<td>
                            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                	<tr>
                                    	<td width="50%">
                                        	<img src="../images/pagetitle.gif" width="468" height="42" border="0" />
                                        </td>
                                        <td style="text-align:right;">
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td colspan="2" height="50px" style="color:#FFCC0A;">
                                        	<?php require_once("../other_files/timesection.php"); ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
              	</td>
          	</tr>
            <tr>
            	<td align="center">
                	<table border="0" width="990px" cellpadding="0" cellspacing="0">
                    	<tr>
                        	<td>
                            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                	<tr>
                                    	<td style="padding-top:10px;">
                                        	<?php require_once("../other_files/loggedin_bar.php"); ?>
                                        </td>
                                    </tr>
                                    <tr>		
                                    	<td style="padding-top:10px;">
                                        	<hr style="background-color:#000" width="100%" size="3" />
                                        </td>
                                    </tr>
                                    <tr>		
                                    	<td style="padding-top:10px;">
                                        	<?php require_once("../other_files/inc_settings.php"); ?>
                                        </td>
                                    </tr>
                                    <tr>		
                                    	<td style="padding-top:10px;">
                                        	<hr style="background-color:#000" width="100%" size="3" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                        	<td height="50px" align="left">
                            	<?php require_once("../other_files/footer_other.php"); ?>
                            </td>
                        </tr>
                    </table>
              	</td>
          	</tr>
       	</table>
    </body>
</html>
