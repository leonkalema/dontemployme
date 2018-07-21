<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Accept Registration
	if($_GET['a'])
	{
		$id = base64_decode($_GET['a']);	
		
		mysql_query("UPDATE users SET ustatus = 1 WHERE id = '".$id."'");
		
		$url = "../panel_area/company_users.php?t=pending";
		
		header("location: ".$url);
	}
	
	//Revoke Registration
	if($_GET['r'])
	{
		$id = base64_decode($_GET['r']);	
		
		mysql_query("UPDATE users SET ustatus = 0 WHERE id = '".$id."'");
		
		$url = "../panel_area/company_users.php?t=accepted";
		
		header("location: ".$url);
	}
	
	//Delete Registration
	if($_GET['d'])
	{
		$id = base64_decode($_GET['d']);
		
		$t = base64_decode($_GET['t']);	
		
		mysql_query("DELETE FROM users WHERE id = '".$id."'");
		
		mysql_query("DELETE FROM user_accounts_companies WHERE userid = '".$id."'");
		
		if($t == 1)
		{
			$url = "../panel_area/company_users.php?t=pending";
		}
		else
		{
			$url = "../panel_area/company_users.php?t=accepted";
		}
		
		header("location: ".$url);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: Company Users</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../site_css/cssfile.css" />
        <link rel="stylesheet" type="text/css" href="../site_css/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" language="javascript" src="../site_js/jquery.js">
        </script>
		<script type="text/javascript" language="javascript" src="../site_js/js.js">
        </script>
        <script type="text/javascript" language="javascript" src="../site_js/modal_wins.js">
        </script>
        <style type="text/css">
			.fancybox-custom .fancybox-outer {
				box-shadow: 0 0 50px #222;
			}
		</style>
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
                                        	<?php require_once("../other_files/inc_companyusers.php"); ?>
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
