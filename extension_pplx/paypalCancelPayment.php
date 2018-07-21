<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
/**********************************************************
DoExpressCheckoutPayment.php

This functionality is called to complete the payment with
PayPal and display the result to the buyer.

The code constructs and sends the DoExpressCheckoutPayment
request string to the PayPal server.

Called by GetExpressCheckoutDetails.php.

Calls CallerService.php and APIError.php.

**********************************************************/

require_once 'CallerService.php';

session_start();


ini_set('session.bug_compat_42',0);
ini_set('session.bug_compat_warn',0);

/* Gather the information to make the final call to
   finalize the PayPal payment.  The variable nvpstr
   holds the name value pairs
   */
$token =urlencode( $_SESSION['token']);
$paymentAmount =urlencode ($_SESSION['TotalAmount']);
$paymentType = urlencode($_SESSION['paymentType']);
$currCodeType = urlencode($_SESSION['currCodeType']);
$payerID = urlencode($_SESSION['payer_id']);
$serverName = urlencode($_SERVER['SERVER_NAME']);

$nvpstr='&TOKEN='.$token.'&PAYERID='.$payerID.'&PAYMENTACTION='.$paymentType.'&AMT='.$paymentAmount.'&CURRENCYCODE='.$currCodeType.'&IPADDRESS='.$serverName ;



 /* Make the call to PayPal to finalize payment
    If an error occured, show the resulting errors
    */
$resArray=hash_call("DoExpressCheckoutPayment",$nvpstr);

/* Display the API response back to the browser.
   If the response from PayPal was a success, display the response parameters'
   If the response was an error, display the errors received using APIError.php.
   */
$ack = strtoupper($resArray["ACK"]);


if($ack != 'SUCCESS' && $ack != 'SUCCESSWITHWARNING'){
	$_SESSION['reshash']=$resArray;
	$location = "APIError.php";
		 header("Location: $location");
               }
			   	
				
	mysql_query("DELETE FROM site_payments WHERE refno = '".$_SESSION['refno']."'");
	
	
	$_SESSION['refno'] = "";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: HR Employee</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content="8;url=../user_accounts/payments.php?t=pending">
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
                                        	<table border="1" width="100%" cellpadding="0" cellspacing="0">
                                            	<tr>
                                                	<td>
                                                    	<font color="red"><b>Order Cancelled <img src="../images/no.gif" width="18" height="18" border="0" class="nostyle" align="absmiddle"></b></font>
                                                        <br /><br />
                                                        Redirecting you shortly to view details of transactions
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