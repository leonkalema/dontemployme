<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
        	<a href="../panel_area/index.php" class="toplinks" title="CONTROL PANEL">CONTROL PANEL</a> <b> :: Manage Payments</b> [ <a href="../panel_area/payments.php?t=pending" class="links" title="View Pending Payments">View Pending Payments</a> ] [ <a href="../panel_area/payments.php?t=approved" class="links" title="View Approved Payments">View Approved Payments</a> ] [ <a href="../panel_area/payments.php?t=view" class="links" title="View All Payments">View All Payments</a> ] 
        </td>
	</tr>
	<?php 

	if($_GET['t'] == "pending") 
	{
		$qry = mysql_query("SELECT * FROM site_payments WHERE status = 1 ORDER BY date_posted DESC");  	
	
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
                                	Payment By
                                </td>
                                <td width="15%" class="tdmain">
                                	Reference No
                                </td>
                                <td width="15%" class="tdmain">
                                	Payment Duration
                                </td>
                                <td width="15%" class="tdmain">
                                	Payment Cost
                                </td>
                                <td width="11%" align="center" class="tdmain">
                                	Approve Payment
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
								
								//User, Duration & cost
								$user = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result['userid']."'"));
								
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
                                	<a class="fancybox fancybox.ajax" href="../other_files/thiscompany.php?task=1&i=<?php echo base64_encode($result['userid']); ?>" id="links" title="Payment By -<?php echo $user[0]; ?> "><?php echo $user[0]; ?></a>
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
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Approve payment for - <?php echo $user['companynames']; ?>?', '../panel_area/payments.php?a=<?php echo base64_encode($result['id']); ?>');" class="links" title="Approve Payment For - <?php echo $user['companynames']; ?>">Approve</a>
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
                            	<td colspan="7" align="left" style="padding-top:10px">
                                	
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
		$qry = mysql_query("SELECT * FROM site_payments WHERE status = 2 ORDER BY date_posted DESC");  	
	
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
                                	Payment By
                                </td>
                                <td width="15%" class="tdmain">
                                	Reference No
                                </td>
                                <td width="15%" class="tdmain">
                                	Payment Duration
                                </td>
                                <td width="15%" class="tdmain">
                                	Payment Cost
                                </td>
                                <td width="11%" align="center" class="tdmain">
                                	Reverse Approval
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
								
								//User, Duration & cost
								$user = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result['userid']."'"));
								
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
                                	<a class="fancybox fancybox.ajax" href="../other_files/thiscompany.php?task=1&i=<?php echo base64_encode($result['userid']); ?>" id="links" title="Payment By -<?php echo $user[0]; ?> "><?php echo $user[0]; ?></a>
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
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Reverse payment approval for - <?php echo $user['companynames']; ?>?', '../panel_area/payments.php?r=<?php echo base64_encode($result['id']); ?>');" class="links" title="Reverse payment approval for - <?php echo $user['companynames']; ?>">Reverse</a>
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
                            	<td colspan="7" align="left" style="padding-top:10px">
                                	
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
		$qry = mysql_query("SELECT * FROM site_payments ORDER BY date_posted DESC");  	
	
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
                                	Payment By
                                </td>
                                <td width="14%" class="tdmain">
                                	Reference No
                                </td>
                                <td width="14%" class="tdmain">
                                	Payment Duration
                                </td>
                                <td width="14%" class="tdmain">
                                	Payment Cost
                                </td>
                                <td width="10%" align="center" class="tdmain">
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
								
								//User, Duration & cost
								$user = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result['userid']."'"));
								
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
                                	<a class="fancybox fancybox.ajax" href="../other_files/thiscompany.php?task=1&i=<?php echo base64_encode($result['userid']); ?>" id="links" title="Payment By -<?php echo $user[0]; ?> "><?php echo $user[0]; ?></a>
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
                                <td align="center" class="tdother">
                                	<?php 
									
									if($result['status'] == 0)
									{
										echo "<font color = \"red\">Incomplete</font><br>";
										?>
                                        <a href="#" title="Delete transaction - <?php echo $result['refno']; ?>" class="links">Delete</a>
                                        <?php
									}
									elseif($result['status'] == 1)
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
                            	<td colspan="7" align="left" style="padding-top:10px">
                                	
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