<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: Contact Us</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../site_css/cssfile.css" />
		<script type="text/javascript" language="javascript" src="../site_js/jquery.js">
        </script>
		<script type="text/javascript" language="javascript" src="../site_js/jsfile.js">
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
                                        	<?php require_once("../other_files/search.php"); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td colspan="2" height="50px">
                                        	<?php require_once("../other_files/menu.php"); ?>
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
                                    	<td width="696px"  valign="top" style="padding-top:10px;">
                                        	<?php require_once("../other_files/left_section.php"); ?>
                                        </td>	
                                    	<td valign="top" style="padding-top:10px;">
                                        	<?php require_once("../other_files/right_section.php"); ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                        	<td height="50px" align="left">
                            	<?php require_once("../other_files/footer.php"); ?>
                            </td>
                        </tr>
                    </table>
              	</td>
          	</tr>
       	</table>
    </body>
</html>
