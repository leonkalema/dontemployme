<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//DATA
	$search_q = inputCleaner($_POST['search_q']);
	
	$search_l = inputCleaner($_POST['search_l']);
	
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <?php
    if($_SESSION['ssvsec'] == 800)
	{
		if($search_l == "pending")
		{
			$qry = mysql_query("SELECT * FROM site_payments WHERE status = 1 && refno LIKE '%".$search_q."%' ORDER BY date_posted DESC");  	
	
			$num = mysql_num_rows($qry);
		?>
		<tr>
			<td>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:10px;">
							<b>Search For Pending Payments</b> - <?php echo $search_q; ?>
						</td>
						<td align="right">
							Found: <b><?php echo $num; ?></b>
						</td>
					</tr>
					<?php
					if($num != 0)
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
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
						</td>
					</tr>
					<?php	
					}
					else
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
							<i><b>0</b> results found for search <b><?php echo $search_q; ?></b>!</i>
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
		elseif($search_l == "approved")
		{
			$qry = mysql_query("SELECT * FROM site_payments WHERE status = 2 && refno LIKE '%".$search_q."%' ORDER BY date_posted DESC");  	
		
			$num = mysql_num_rows($qry);
		?>
		<tr>
			<td>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:10px;">
							<b>Search For Approved Payments</b> - <?php echo $search_q; ?>
						</td>
						<td align="right">
							Found: <b><?php echo $num; ?></b>
						</td>
					</tr>
					<?php
					if($num != 0)
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
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
						</td>
					</tr>
					<?php	
					}
					else
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
							<i><b>0</b> results found for search <b><?php echo $search_q; ?></b>!</i>
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
		else
		{
			$qry = mysql_query("SELECT * FROM site_payments WHERE refno LIKE '%".$search_q."%' ORDER BY date_posted DESC");  	
	
			$num = mysql_num_rows($qry);
		?>
		<tr>
			<td>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:10px;">
							<b>Search For All Payments</b> - <?php echo $search_q; ?>
						</td>
						<td align="right">
							Found: <b><?php echo $num; ?></b>
						</td>
					</tr>
					<?php
					if($num != 0)
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
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
						</td>
					</tr>
					<?php	
					}
					else
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
							<i><b>0</b> results found for search <b><?php echo $search_q; ?></b>!</i>
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
	}
	else
	{
		if($search_l == "pending")
		{
			$qry = mysql_query("SELECT * FROM site_payments WHERE userid = '".$_SESSION['ssvid']."' && status = 1 && refno LIKE '%".$search_q."%' ORDER BY date_posted DESC");  	
	
			$num = mysql_num_rows($qry);
		?>
		<tr>
			<td>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:10px;">
							<b>Search For Pending Payments</b> - <?php echo $search_q; ?>
						</td>
						<td align="right">
							Found: <b><?php echo $num; ?></b>
						</td>
					</tr>
					<?php
					if($num != 0)
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
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
						</td>
					</tr>
					<?php	
					}
					else
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
							<i><b>0</b> results found for search <b><?php echo $search_q; ?></b>!</i>
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
		elseif($search_l == "approved")
		{
			$qry = mysql_query("SELECT * FROM site_payments WHERE userid = '".$_SESSION['ssvid']."' && status = 2 && refno LIKE '%".$search_q."%' ORDER BY date_posted DESC");  	
	
			$num = mysql_num_rows($qry);
		?>
		<tr>
			<td>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:10px;">
							<b>Search For Approved Payments</b> - <?php echo $search_q; ?>
						</td>
						<td align="right">
							Found: <b><?php echo $num; ?></b>
						</td>
					</tr>
					<?php
					if($num != 0)
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
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
						</td>
					</tr>
					<?php	
					}
					else
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
							<i><b>0</b> results found for search <b><?php echo $search_q; ?></b>!</i>
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
		else
		{
			$qry = mysql_query("SELECT * FROM site_payments WHERE userid = '".$_SESSION['ssvid']."' && refno = '%".$search_q."%' ORDER BY date_posted DESC");  	
	
			$num = mysql_num_rows($qry);
		?>
		<tr>
			<td>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:10px;">
							<b>Search For All Payments</b> - <?php echo $search_q; ?>
						</td>
						<td align="right">
							Found: <b><?php echo $num; ?></b>
						</td>
					</tr>
					<?php
					if($num != 0)
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
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
						</td>
					</tr>
					<?php	
					}
					else
					{
					?>
					<tr>
						<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
							<i><b>0</b> results found for search <b><?php echo $search_q; ?></b>!</i>
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
	}
	?>
    </table>
	<?php
?>