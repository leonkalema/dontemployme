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
		<script type="text/javascript" language="javascript" src="../site_js/js_js.js">
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
                                    	<td width="50%" align="left">
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
                                                	<td align="left">
                                                    	<b>DASH BOARD</b>
                                                    </td>
                                              	</tr>
                                          	</table>
                                      	</td>
                                 	</tr>
                                    <tr>		
                                    	<td style="padding-top:10px;">
                                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                            	<tr>
                                                	<td style="height:300px; vertical-align:middle;">
                                                    	<?php
                                                        if($_SESSION['ssvsec'] == 700)
														{
														?>
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                        	<tr>
                                                            	<td width="33%" align="center">
                                                                	<a href="../user_accounts/wanted_persons.php?t=view" title="WANTED Persons">
                                                                    	<img src="../images/company_users.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                                <td width="33%" align="center">
                                                                	<a href="#" title="Edit Profile">
                                                                    	<img src="../images/settings.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                            	<td height="30px" colspan="3">
                                                                </td>
                                                            </tr>
                                                            	<td align="center">
                                                                	<a href="../user_accounts/wanted_persons.php?t=view" class="links" style="text-decoration:none;" title="WANTED Persons">
                                                                    	<b>WANTED Persons</b>
                                                                    </a>
                                                                </td>
                                                                <td align="center">
                                                                	<a href="#" class="links" style="text-decoration:none;" title="Edit Profile">
                                                                    	 <b>Edit Profile</b>
                                                                    </a>
                                                                </td>
                                                        </table>
                                                        <?php
														}
														else
														{
														?>
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                        	<tr>
                                                            	<td width="33%" align="center">
                                                                	<a href="../user_accounts/payments.php?t=view" title="Manage Payments">
                                                                    	<img src="../images/payments.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                                <td width="33%" align="center">
                                                                	<a href="../user_accounts/hr_employee.php?t=view" title="HR Employee">
                                                                    	<img src="../images/company_users.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                                <td width="33%" align="center">
                                                                	<a href="#" title="Edit Profile">
                                                                    	<img src="../images/settings.jpg" width="63" height="63" border="0" />
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                            	<td height="30px" colspan="3">
                                                                </td>
                                                            </tr>
                                                            	<td align="center">
                                                                	<a href="../user_accounts/payments.php?t=view" class="links" style="text-decoration:none;" title="Manage Payments">
                                                                    	<b>Manage Payments</b>
                                                                    </a>
                                                                </td>
                                                                <td align="center">
                                                                	<a href="../user_accounts/hr_employee.php?t=view" class="links" style="text-decoration:none;" title="HR Employee">
                                                                    	<b>HR Employee</b>
                                                                    </a>
                                                                </td>
                                                                <td align="center">
                                                                	<a href="#" class="links" style="text-decoration:none;" title="Edit Profile">
                                                                    	 <b>Edit Profile</b>
                                                                    </a>
                                                                </td>
                                                        </table>
                                                        <?php		
														}
														?>
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
