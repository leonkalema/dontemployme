<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Delete 
	if($_GET['d'])
	{
		$id = base64_decode($_GET['d']);
		
		//$url = "../panel_area/police_users.php?t=view";
		
		header("location: ".$url);
	}
	
	//Delete hr employee
	if($_GET['dhr'])
	{
		$id = base64_decode($_GET['dhr']);
		
		$userid = mysql_fetch_array(mysql_query("SELECT picture FROM persons_list WHERE id = '".$id."'"));
		
		mysql_query("DELETE FROM persons_list WHERE id = '".$id."'");
		
		unlink("../file_loads/".$userid[0]);
		
		$url = "../user_accounts/hr_employee.php?t=view";
		
		header("location: ".$url);
	}
	
	
	//Cancel listing
	if($_GET['clk'])
	{
		$id = base64_decode($_GET['clk']);
		
		$listing = mysql_fetch_array(mysql_query("SELECT paymentid FROM running_list WHERE personid = '".$id."'"));
		
		mysql_query("DELETE FROM running_list WHERE personid = '".$id."'");
		
		mysql_query("UPDATE site_payments SET inuse = 0 WHERE id = '".$listing['paymentid']."'");
		
		mysql_query("UPDATE persons_list SET status = 0 WHERE id = '".$id."'");
		
		$url = "../user_accounts/hr_employee.php?t=view";
		
		header("location: ".$url);	
	}
	
	//require_once("../other_files/upload_crop_sc.php");	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: HR Employee</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../site_css/cssfile.css" />
        <link rel="stylesheet" type="text/css" href="../site_css/tabs.css" />
        <link type="text/css" href="../site_css/theme/base/ui.all.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../site_css/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" language="javascript" src="../site_js/jquery.js">
        </script>
		<script type="text/javascript" language="javascript" src="../site_js/js_js.js">
        </script>
        <script type="text/javascript" src="../site_js/ui/ui.core.js"></script>
    	<script type="text/javascript" src="../site_js/ui/ui.datepicker.js"></script>
		<script type="text/javascript">
    
			$(function() {
	
			$("#dateofbirth").datepicker();
		});

			$(function() {
	
			$("#startdate").datepicker({minDate: -0, maxDate: '+1M'});
		});	
		</script>
        <script type="text/javascript" src="../site_js/tabs.js">
        </script>
        <script type='text/javascript' language="javascript">
			$(function() {		
				$("#example-one").organicTabs();		
			});
		</script>
        <script type="text/javascript" language="javascript" src="../site_js/modal_wins.js">
        </script>
        <style type="text/css">
			.fancybox-custom .fancybox-outer {
				box-shadow: 0 0 50px #222;
			}
		</style>
        <?php
        if($_GET['p'] || $_GET['editpic'])
		{
		?>
		<script language="javascript" type="text/javascript">
			<!--
			function startUpload()
			{
				  $("#error_msg2").html("<font color = \"#008101\">Processing . . . </font><img src='../images/loader.gif' name = 'img1' align = 'absmiddle' width='16' height = '11' alt='loading'>");
				  
				  return true;
			}
			
			function stopUpload(success)
			{
			 	
				var result = '';
			  
			  	if (success == 1)
			  	{
				 	$("#error_msg2").html("<font color = 'red'>Invalid file browsed, please browse for file with types .gif or .jpg</font>");
			  	}
			  else if (success == 2)
			  {
				 $("#error_msg2").html("<font color = 'red'>Please browse for a file less than 2MB in size.</font>");
			  }
			   else if (success == 3)
			  {
				 $("#error_msg2").html("<font color = 'red'>Please browse for a picture of width less than or equal to 190px and height less than or equal to 210px</font>");
			  }
			  else if (success == 4)
			  {
				 $("#error_msg2").html("<font color = 'green'>Employee picture added successfully!</font>");
			  }
			  else if (success == 5)
			  {
				 $("#error_msg2").html("<font color = 'red'>Unable to add employee picture, please retry.</font>");
			  }	
			   else if (success == 6)
			  {
				 $("#error_msg2").html("<font color = 'green'>Employee picture updated successfully!</font>");
			  }	  
			  else 
			  {
				 $("#error_msg2").html("<font color = 'red'>Unhandled error occurred!</font>");
			  }
					
			  return true;   
		}
		//-->
		</script>
        <?php
		}
		?>
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
                                    	<td style="padding-top:10px;" align="left">
                                        	<?php require_once("../other_files/inc_hrsection.php"); ?>
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
