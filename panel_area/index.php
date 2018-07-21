<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: Control Panel</title>
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
                                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                            	<tr>
                                                	<td style="height:300px; vertical-align:middle;">
                                                    	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                        	<tr>
                                                            	<td width="16%" align="center">
                                                                	<a href="../panel_area/company_users.php?t=pending" title="Company Users">
                                                                    	<img src="../images/company_users.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            	<td width="16%" align="center">
                                                                	<a href="police_users.php?t=view" title="POLICE Users">
                                                                    	<img src="../images/police_users.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            	<td width="16%" align="center">
                                                                	<a href="../panel_area/website_list.php" title="HR/WANTED PERSONS">
                                                                    	<img src="../images/wanted_person.gif" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                                <td width="16%" align="center">
                                                                	<a href="../panel_area/payments.php?t=pending" title="Manage Payments">
                                                                    	<img src="../images/payments.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            	<td width="16%" align="center">
                                                                	<a href="../panel_area/website_pages.php?task=home" title="Website Pages">
                                                                    	<img src="../images/website_s.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            	<td width="16%" align="center">
                                                                	<a href="../panel_area/settings_panel.php" title="System Settings">
                                                                    	<img src="../images/settings.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                            	<td height="30px" colspan="6">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                            	<td align="center">
                                                                	<a href="../panel_area/company_users.php?t=pending" class="links" style="text-decoration:none;" title="Company Users">
                                                                    	<b>Company Users</b>
                                                                    </a>
                                                                </td>
                                                            	<td align="center">
                                                                	<a href="../panel_area/police_users.php?t=view" class="links" style="text-decoration:none;" title="Police Users">
                                                                    	<b>POLICE Users</b>
                                                                    </a>
                                                                </td>
                                                            	<td align="center">
                                                                	<a href="../panel_area/website_list.php" class="links" style="text-decoration:none; color:#990000;" title="HR/WANTED PERSONS">
                                                                    	<b>HR/WANTED PERSONS</b>
                                                                    </a>
                                                                </td>
                                                                <td align="center">
                                                                	<a href="../panel_area/payments.php?t=pending" class="links" style="text-decoration:none;" title="Manage Payments">
                                                                    	<b>Manage Payments</b>
                                                                    </a>
                                                                </td>
                                                            	<td align="center">
                                                                	<a href="../panel_area/website_pages.php?task=home" class="links" style="text-decoration:none;" title="Website Pages">
                                                                    	<b>Website Pages</b>
                                                                    </a>
                                                                </td>
                                                            	<td align="center">
                                                                	<a href="../panel_area/settings_panel.php" class="links" style="text-decoration:none;" title="System Settings">
                                                                    	 <b>System Settings</b>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
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
