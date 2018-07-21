<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
        	<a href="../user_accounts/index.php" class="toplinks" title="DASH BOARD">DASH BOARD</a> <b> :: Manage Payments</b> [ <a href="../user_accounts/payments.php?t=howto" class="links" title="How To Pay">How To Pay</a> ] [ <a href="../user_accounts/payments.php?t=add" class="links" title="Add Payment">Add Payments</a> ] [ <a href="../user_accounts/payments.php?t=pending" class="links" title="View Pending Payments">View Pending Payments</a> ] [ <a href="../user_accounts/payments.php?t=approved" class="links" title="View Approved Payments">View Approved Payments</a> ] [ <a href="../user_accounts/payments.php?t=view" class="links" title="View All Payments">View All Payments</a> ] 
        </td>
	</tr>
	<?php 

	if($_GET['t'] == "howto")
	{
		$website = mysql_fetch_array(mysql_query("SELECT * FROM website_pages WHERE location = 'howtopay'"));
		
		$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
		
		$qry = mysql_query("SELECT d.id, d.names, r.paymentrate FROM payment_rates r, payment_durations d WHERE r.durationid = d.id ORDER BY d.duration ASC");
	
	?>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="2" cellspacing="2">
				<tr>
					<td style="padding-top:10px;">
						<b>How To Pay</b>
					</td>
				</tr>
				<tr>
                	<td>
                    	<?php echo $website['content']; ?>
                    </td>
                </tr>
                <tr>
              		<td style="padding-top:10px;">
                    	<b>Payment Details</b>
                	</td>
              	</tr>
                <?php
                while($result = mysql_fetch_array($qry))
				{
					 $thiscost = "";
					
						if($currency['currency_abbrev_position'] == 1)
						{
							$prev = $currency['currency_abbrev'];
						}
							
						if($currency['symbol_position'] == 1)
						{
							$prev =  " ".$currency['symbol'];
						}
							
						$cost = " ".number_format($result['paymentrate'], "0", "", ","); 
							
						if($currency['symbol_position'] == 2)
						{
							$after =  $currency['symbol'];
						}
							
						if($currency['currency_abbrev_position'] == 2)
						{
							$after =  $currency['currency_abbrev'];
						}
						
						$rates = $currency['currency_abbrev'].$prev.$cost.$after;
				 ?>
				 <tr>
	 				<td style="padding-top:10px; padding-bottom:10px;">
						<?php echo $result['names']." at a cost of  ".$rates; ?>
                   	</td>
               	</tr>
				 <?php	
                 }
                ?>
            </table>
		</td>
	</tr>
	<?php
	}
	elseif($_GET['t'] == "add")
	{
	?>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="2" cellspacing="2">
				<tr>
					<td style="padding-top:10px;">
						<b>Add Payment</b>
					</td>
				</tr>
				<tr>
                	<td>
                    	<form action="../extension_pplx/ReviewOrder.php" autocomplete = "off" method="POST" onSubmit="return Empty('durationid', 'Please select payment duration', 'error_msg2') && confirmPayment();">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="2">
                                    <div id="error_msg2"></div>
                                    <input type="hidden" name="paymentType" id="paymentType" value="<?php echo $paymentType?>">
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="15%" style="padding-top:10px;">
                                    Reference No: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                    <b><?php require_once("../other_files/run_ref.php"); ?></b>
                                </td>
                            </tr>
                           <tr>
                                <td align="right" style="padding-top:10px;">
                                    Select Payment Duration: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                	<?php 

									$qry = mysql_query("SELECT d.id, d.names, r.paymentrate FROM payment_rates r, payment_durations d WHERE r.durationid = d.id ORDER BY d.duration ASC");
			
									$num = mysql_num_rows($qry);
									
									$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
									
									if($num != 0)
									{
									?>
										<select name="durationid" id="durationid" onchange="return Empty('durationid', 'Please select payment duration', 'error_msg2') && savePayments('durationid');">
									   	<option value=""> - Please select payment duration - </option>
										<?php
										
										while($result = mysql_fetch_array($qry))
										 {
											 $thiscost = "";
											
											if($currency['currency_abbrev_position'] == 1)
											{
												$prev = $currency['currency_abbrev'];
											}
												
											if($currency['symbol_position'] == 1)
											{
												$prev =  " ".$currency['symbol'];
											}
												
											$cost = " ".number_format($result['paymentrate'], "0", "", ","); 
												
											if($currency['symbol_position'] == 2)
											{
												$after =  $currency['symbol'];
											}
												
											if($currency['currency_abbrev_position'] == 2)
											{
												$after =  $currency['currency_abbrev'];
											}
											
											$rates = $currency['currency_abbrev'].$prev.$cost.$after;
										 ?>
										 <option value="<?php echo $result['id']; ?>"><?php echo $result['names']." at a cost of  ".$rates; ?></option>
										 <?php	
										 }
										 ?>
										 </select>
										 <?php
									}
									else
									{
									?>
									 <i>No payment durations found!</i>
									 <input type="hidden" name="durationid" id="durationid" value="">
									 <?php		
									}
									?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                    <input type="hidden" size="30" maxlength="32" name="L_NAME0" id="L_NAME0" value="" />
                                    <input type="hidden" name="L_AMT0" id="L_AMT0" size="5" maxlength="32" value="" />
                                    <input type="hidden" size="3" maxlength="32" name="L_QTY0" id="L_QTY0" value="1" />
                                    <input type="hidden" name="currencyCodeType" value="<?php echo $_SESSION['currency_abbrev']; ?>" />
                                    <input type="hidden" size="30" maxlength="32" name="PERSONNAME" value="<?php echo $_SESSION['compnames']; ?>" />
                                </td>
                                <td style="padding-top:10px; padding-bottom:30px;">
                                   <input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" class="nostyle" />
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
		</td>
	</tr>
	<?php
	}
	elseif($_GET['t'] == "pending") 
	{
		$qry = mysql_query("SELECT * FROM site_payments WHERE userid = '".$_SESSION['ssvid']."' && status = 1 ORDER BY date_posted DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<div id="texthide"><b>View Pending Payments</b></div>
                    </td>
                    <td align="right">
                    	<div id="texthide2">Found: <b><?php echo $num; ?></b></div>
                    </td>
                </tr>
                <?php
				if($num != 0)
				{
				?>
                <tr>
                	<td colspan="2" style="padding-top:10px;">
                    	<?php require_once("../other_files/search_refno.php"); ?>
                    </td>
                </tr>
                <tr>
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<div id="disp_area">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td width="3%" class="tdmain">
                                	#
                                </td>
                                <td class="tdmain">
                                	Reference No
                                </td>
                                <td width="25%" class="tdmain">
                                	Payment Duration
                                </td>
                                <td width="25%" class="tdmain">
                                	Payment Cost
                                </td>
                                <td width="20%" class="tdmain">
                                	Date posted
                                </td>
                            </tr>
                            <?php
							
							$counter = 1;
							
							$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
									
							while($result = mysql_fetch_array($qry))
							{
								if(($counter % 2) == 0)
								{
									$row = "evenrow";
								}
								else
								{
									$row = "oddrow";
								}
								
								//Duration & cost
								$duration = mysql_fetch_array(mysql_query("SELECT names FROM payment_durations WHERE id = '".$result['durationid']."'"));
								
								$thiscost = mysql_fetch_array(mysql_query("SELECT paymentrate FROM payment_rates WHERE durationid = '".$result['durationid']."'"));
								
								if($currency['currency_abbrev_position'] == 1)
								{
									$prev = $currency['currency_abbrev'];
								}
						
								if($currency['symbol_position'] == 1)
								{
									$prev =  " ".$currency['symbol'];
								}
									
								$cost = " ".number_format($thiscost['paymentrate'], "0", "", ","); 
									
								if($currency['symbol_position'] == 2)
								{
									$after =  $currency['symbol'];
								}
									
								if($currency['currency_abbrev_position'] == 2)
								{
									$after =  $currency['currency_abbrev'];
								}
								
								$rates = $currency['currency_abbrev'].$prev.$cost.$after;
							?>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                	<b><?php echo $counter; ?></b>
                                </td>
                                <td class="tdother">
                                	<b class="toplinks"><?php echo $result['refno']; ?></b>
                                </td>
                                <td class="tdother">
                                	<?php echo $duration['names']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo $rates; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_posted']); ?>
                                </td>
                                
                            </tr>
                            <?php
							$counter++;		
							}
							?>
                            <tr>
                            	<td colspan="6" align="left" style="padding-top:10px">
                                	
                                </td>
                            </tr>
                        </table>
                        </div>
                    </td>
                </tr>
                <?php	
				}
				else
				{
				?>
                <tr>
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<i><b>0</b> results found!</i>
                    </td>
                </tr>
                <?php		
				}
				?>
            </table>
        </td>
    </tr>
 	<?php
	}
	elseif($_GET['t'] == "approved") 
	{
		$qry = mysql_query("SELECT * FROM site_payments WHERE userid = '".$_SESSION['ssvid']."' && status = 2 ORDER BY date_posted DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<div id="texthide"><b>View Approved Payments</b></div>
                    </td>
                    <td align="right">
                    	<div id="texthide2">Found: <b><?php echo $num; ?></b></div>
                    </td>
                </tr>
                <?php
				if($num != 0)
				{
				?>
                <tr>
                	<td colspan="2" style="padding-top:10px;">
                    	<?php require_once("../other_files/search_refno.php"); ?>
                    </td>
                </tr>
                <tr>
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<div id="disp_area">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td width="3%" class="tdmain">
                                	#
                                </td>
                                <td class="tdmain">
                                	Reference No
                                </td>
                                <td align="center" width="6%" class="tdmain">
                                	In Use
                                </td>
                                <td width="25%" class="tdmain">
                                	Payment Duration
                                </td>
                                <td width="25%" class="tdmain">
                                	Payment Cost
                                </td>
                                <td width="20%" class="tdmain">
                                	Date posted
                                </td>
                            </tr>
                            <?php
							
							$counter = 1;
							
							$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
									
							while($result = mysql_fetch_array($qry))
							{
								if(($counter % 2) == 0)
								{
									$row = "evenrow";
								}
								else
								{
									$row = "oddrow";
								}
								
								//Duration & cost
								$duration = mysql_fetch_array(mysql_query("SELECT names FROM payment_durations WHERE id = '".$result['durationid']."'"));
								
								$thiscost = mysql_fetch_array(mysql_query("SELECT paymentrate FROM payment_rates WHERE durationid = '".$result['durationid']."'"));
								
								if($currency['currency_abbrev_position'] == 1)
								{
									$prev = $currency['currency_abbrev'];
								}
						
								if($currency['symbol_position'] == 1)
								{
									$prev =  " ".$currency['symbol'];
								}
									
								$cost = " ".number_format($thiscost['paymentrate'], "0", "", ","); 
									
								if($currency['symbol_position'] == 2)
								{
									$after =  $currency['symbol'];
								}
									
								if($currency['currency_abbrev_position'] == 2)
								{
									$after =  $currency['currency_abbrev'];
								}
								
								$rates = $currency['currency_abbrev'].$prev.$cost.$after;
							?>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                	<b><?php echo $counter; ?></b>
                                </td>
                                <td class="tdother">
                                	<b class="toplinks"><?php echo $result['refno']; ?></b>
                                </td>
                                <td class="tdother" align="center">
                                	<?php 
												
									if($result['inuse'] == 1)
									{
										echo "<font color=\"green\"><b>Yes</b></font>";
									}
									else
									{
										echo "<font color=\"red\"><b>No</b></font>";	
									}
												
									?>
                                </td>
                                <td class="tdother">
                                	<?php echo $duration['names']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo $rates; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_posted']); ?>
                                </td>
                                
                            </tr>
                            <?php
							$counter++;		
							}
							?>
                            <tr>
                            	<td colspan="6" align="left" style="padding-top:10px">
                                	
                                </td>
                            </tr>
                        </table>
                        </div>
                    </td>
                </tr>
                <?php	
				}
				else
				{
				?>
                <tr>
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<i><b>0</b> results found!</i>
                    </td>
                </tr>
                <?php		
				}
				?>
            </table>
        </td>
    </tr>
 	<?php
	}
	elseif($_GET['t'] == "view") 
	{
		$qry = mysql_query("SELECT * FROM site_payments WHERE userid = '".$_SESSION['ssvid']."' ORDER BY date_posted DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<div id="texthide"><b>View All Payments</b></div>
                    </td>
                    <td align="right">
                    	<div id="texthide2">Found: <b><?php echo $num; ?></b></div>
                    </td>
                </tr>
                <?php
				if($num != 0)
				{
				?>
                <tr>
                	<td colspan="2" style="padding-top:10px;">
                    	<?php require_once("../other_files/search_refno.php"); ?>
                    </td>
                </tr>
                <tr>
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<div id="disp_area">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td width="3%" class="tdmain">
                                	#
                                </td>
                                <td class="tdmain">
                                	Reference No
                                </td>
                                <td align="center" width="6%" class="tdmain">
                                	In Use
                                </td>
                                <td width="25%" class="tdmain">
                                	Payment Duration
                                </td>
                                <td width="25%" class="tdmain">
                                	Payment Cost
                                </td>
                                <td width="10%" class="tdmain">
                                	Status
                                </td>
                                <td width="15%" class="tdmain">
                                	Date posted
                                </td>
                            </tr>
                            <?php
							
							$counter = 1;
							
							$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
									
							while($result = mysql_fetch_array($qry))
							{
								if(($counter % 2) == 0)
								{
									$row = "evenrow";
								}
								else
								{
									$row = "oddrow";
								}
								
								//Duration & cost
								$duration = mysql_fetch_array(mysql_query("SELECT names FROM payment_durations WHERE id = '".$result['durationid']."'"));
								
								$thiscost = mysql_fetch_array(mysql_query("SELECT paymentrate FROM payment_rates WHERE durationid = '".$result['durationid']."'"));
								
								if($currency['currency_abbrev_position'] == 1)
								{
									$prev = $currency['currency_abbrev'];
								}
						
								if($currency['symbol_position'] == 1)
								{
									$prev =  " ".$currency['symbol'];
								}
									
								$cost = " ".number_format($thiscost['paymentrate'], "0", "", ","); 
									
								if($currency['symbol_position'] == 2)
								{
									$after =  $currency['symbol'];
								}
									
								if($currency['currency_abbrev_position'] == 2)
								{
									$after =  $currency['currency_abbrev'];
								}
								
								$rates = $currency['currency_abbrev'].$prev.$cost.$after;
							?>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                	<b><?php echo $counter; ?></b>
                                </td>
                                <td class="tdother">
                                	<b class="toplinks"><?php echo $result['refno']; ?></b>
                                </td>
                                <td class="tdother" align="center">
                                	<?php 
												
									if($result['inuse'] == 1)
									{
										echo "<font color=\"green\"><b>Yes</b></font>";
									}
									else
									{
										echo "<font color=\"red\"><b>No</b></font>";	
									}
												
									?>
                                </td>
                                <td class="tdother">
                                	<?php echo $duration['names']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo $rates; ?>
                                </td>
                                <td class="tdother">
                                	<?php 
									
									if($result['status'] == 1)
									{
										echo "<font color = \"red\">Pending</font>";
									}
									elseif($result['status'] == 2)
									{
										echo "<font color = \"green\">Approved</font>";
									}
									elseif($result['status'] == 3)
									{
										echo "<font color = \"red\">Expired</font>";
									}
									
									?>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_posted']); ?>
                                </td>
                                
                            </tr>
                            <?php
							$counter++;		
							}
							?>
                            <tr>
                            	<td colspan="6" align="left" style="padding-top:10px">
                                	
                                </td>
                            </tr>
                        </table>
                        </div>
                    </td>
                </tr>
                <?php	
				}
				else
				{
				?>
                <tr>
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<i><b>0</b> results found!</i>
                    </td>
                </tr>
                <?php		
				}
				?>
            </table>
        </td>
    </tr>
 	<?php
	}
	?>
</table>