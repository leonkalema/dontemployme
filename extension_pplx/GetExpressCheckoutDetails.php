<?php
/********************************************************
GetExpressCheckoutDetails.php

This functionality is called after the buyer returns from
PayPal and has authorized the payment.

Displays the payer details returned by the
GetExpressCheckoutDetails response and calls
DoExpressCheckoutPayment.php to complete the payment
authorization.

Called by ReviewOrder.php.

Calls DoExpressCheckoutPayment.php and APIError.php.

********************************************************/

/* Collect the necessary information to complete the
   authorization for the PayPal payment
   */

$_SESSION['token']=$_REQUEST['token'];
$_SESSION['payer_id'] = $_REQUEST['PayerID'];

$_SESSION['paymentAmount']=$_REQUEST['paymentAmount'];
$_SESSION['currCodeType']=$_REQUEST['currencyCodeType'];
$_SESSION['paymentType']=$_REQUEST['paymentType'];

$resArray=$_SESSION['reshash'];
$_SESSION['TotalAmount']= $resArray['AMT'] + $resArray['SHIPDISCAMT'];

/* Display the  API response back to the browser .
   If the response from PayPal was a success, display the response parameters
   */

?>
<form action="DoExpressCheckoutPayment.php" method="POST">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td style="padding-top:10px;" colspan="2">
        	<b>Review Order</b>
        </td>
    </tr>
    <tr>
    	<td width="10%" style="padding-top:10px;" align="right">
        	Payment for: &nbsp;
      	</td>
        <td style="padding-top:10px;">
        	<?php  echo $resArray['L_NAME0']; ?>       		           
        </td>
    </tr>
    <tr>
    	<td style="padding-top:10px;" align="right">
        	Quantity: &nbsp;
      	</td>
        <td style="padding-top:10px;">
        	1       		           
        </td>
    </tr>
    <tr>
    	<td style="padding-top:10px;" align="right">
        	Order Total: &nbsp;
      	</td>
        <td style="padding-top:10px;">
        	<?php  echo $_REQUEST['currencyCodeType'];   echo $resArray['AMT'] + $resArray['SHIPDISCAMT'] ?>       		           
        </td>
    </tr>
    <tr>
    	<td>
        	<?php //require_once 'ShowAllResponse.php'; ?>
      	</td>
        <td style="padding-top:10px;">
        	<input type="submit" value="Pay Now" />       		           
        </td>
    </tr>
</table>
</form>