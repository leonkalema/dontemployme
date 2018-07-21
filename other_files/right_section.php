<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                    <td>
                    	<!-- PayPal Logo -->
                        <table border="0" cellpadding="10" cellspacing="0" align="center">
                        	<tr>
                            	<td align="center">
                                </td>
                          	</tr>
							<tr>
                            	<td align="center">
                                	<a href="#" onclick="javascript:window.open('https://www.paypal.com/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img  src="https://www.paypal.com/en_US/i/bnr/horizontal_solution_PPeCheck.gif" border="0" alt="Solution Graphics">
                                	</a>
                             	</td>
                        	</tr>
                      	</table>
                        <!-- PayPal Logo -->
                    </td>
                </tr>
            </table>
        </td>
	</tr>
	<?php
	if($thispage[3] != "xxx.php")
	{
	?>
    <tr>
    	<td>
        	<form name="signin" method="post" action="#signin" autocomplete = "off" onsubmit="return Empty('username1', 'Please enter your username', 'error_msg1') && Empty('password0', 'Please enter your password', 'error_msg1') && signInUser('username1', 'password0', 'error_msg1');">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td colspan="2" align="right">
                    	<img src="../images/website_l.jpg" width="289" height="41" border="0">
                   	</td>
              	</tr>
                <tr>
                	<td colspan="2" style="padding-left:4px;">
                    	<div id="error_msg1"></div>
                    </td>
                </tr>
                <tr>
                	<td width="27%" style="padding-top:10px;" align="right">
                    	Username: &nbsp;
                    </td>
                    <td style="padding-top:10px;" align="left">
                    	<input type="text" name="username1" id="username1" class="logintext" size="32">
                    </td>
             	</tr>
                <tr>
                    <td align="right" style="padding-top:10px;">
                    	Password: &nbsp;
                    </td>
                    <td style="padding-top:10px;" align="left">
                    	<input type="password" name="password0" id="password0" class="logintext" size="32">
                    </td>
                </tr>
                <tr>
                	<td>
                    </td>
                    <td style="padding-top:10px;" align="left">
                    	<input type="image" src="../images/signin.jpg" width="56" height="25" border="0" class="nostyle" value="Sign In">
                        <br><br>
                        No account? Please <a href="../home/register_here.php" class="links" title="Register Here">Register Here</a>
                    </td>
                </tr>
          	</table>
            </form>
        </td>
    </tr>
    <?php
	}
	?>
</table>