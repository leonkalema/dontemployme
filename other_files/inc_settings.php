<table border="0" align="center" width="995px" cellpadding="0" cellspacing="0">
	<tr>
    	<td align="left">
        	<a href="../panel_area/index.php" class="toplinks" title="CONTROL PANEL">CONTROL PANEL</a> <b>::</b> <a href="../panel_area/settings_panel.php" class="blacklinks" title="Settings Panel">Settings Panel</a>
    	</td>
   	</tr>
    <tr>
    	<td>
        	<hr style="background-color:#000" width="100%" size="3" />
  		</td>
  	</tr>
    <?php
    if($_GET['task'] == "currency")
	{
	?>
	<tr>
		<td align="left">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">
						<b>Manage Currency</b> [<a href="../panel_area/settings.php?task=currency&t=add" class="links" title="Add currency">Add currency</a>] [<a href="../panel_area/settings.php?task=currency&t=view" class="links" title="View Currencies">View Currencies</a>]
					</td>
				</tr>
				<?php
				if($_GET['t'] == "add" || $_GET['edit'])
				{
					if($_GET['edit'])
					{
						$id = base64_decode($_GET['edit']);
					
						$edit = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE id = '".$id."'"));
					}
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<?php
                                     if($_GET['edit'])
									{
									?>
                                     	<b>Edit Currency - </b><?php echo $edit['currency']; ?>
                                    	<?php	
									}
									else
									{
									?>
                                     	<b>Add Currency</b>
                                    	<?php
									}
									?>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<div id="error_msg">
									</div>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<form method="post" autocomplete = "off" action="xmlactionx--" onsubmit="return Empty('currency', 'Please enter currency name', 'error_msg') && Empty('currency_abbrev', 'Please enter currency abbreviation', 'error_msg') && Empty('currency_abbrev_position', 'Please select currency abbreviation position', 'error_msg') && Empty('symbol', 'Please enter currency symbol', 'error_msg') && Empty('symbol_position', 'Please select currency symbol position', 'error_msg') && addoreditCurrency('currency', 'currency_abbrev', 'currency_abbrev_position', 'symbol', 'symbol_position', 'editid', 'error_msg');">
                                     <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                     	<tr>
                                         	<td>
                                             	<table border="0" width="50%" cellpadding="2" cellspacing="8">
                                                  <tr>
                                                      <td width="38%" class="righttd">
                                                          Currency name: &nbsp;
                                                      </td>
                                                      <td>
                                                          <input type="text" name="currency" id="currency" size="38" value="<?php echo $edit['currency']; ?>" /> 
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td class="righttd">    
                                                          Currency abbrev: &nbsp;
                                                      </td>
                                                      <td>
                                                          <input type="text" name="currency_abbrev" id="currency_abbrev" size="38" value="<?php echo $edit['currency_abbrev']; ?>" />
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td class="righttd">
                                                          Currency abbrev position: &nbsp;
                                                      </td>
                                                      <td>
                                                          <select name="currency_abbrev_position" id="currency_abbrev_position">
                                                              <?php
                                                              if($_GET['edit'])
                                                            {
                                                                if($edit['currency_abbrev_position'] == 1)
                                                                {
                                                                    $location = "Before Amount";	
                                                                }
                                                                else
                                                                {
                                                                    $location = "After Amount";
                                                                }
                                                            ?>
                                                              <option value="<?php echo $edit['currency_abbrev_position']; ?>"><?php echo $location; ?></option>
                                                              <option value="">-Select below-</option>
                                                              <?php		
                                                            }
                                                            ?>
                                                              <option value="1">Before Amount</option>
                                                              <option value="2">After Amount</option>
                                                          </select>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td class="righttd">
                                                          Symbol: &nbsp;
                                                      </td>
                                                      <td>
                                                          <input type="text" name="symbol" id="symbol" size="38" value="<?php echo $edit['symbol']; ?>" />
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td class="righttd">
                                                          Symbol position: &nbsp;
                                                      </td>
                                                      <td>
                                                          <select name="symbol_position" id="symbol_position">
                                                              <?php
                                                              if($_GET['edit'])
                                                            {
                                                                if($edit['symbol_position'] == 1)
                                                                {
                                                                    $location2 = "Before Amount";	
                                                                }
                                                                else
                                                                {
                                                                    $location2 = "After Amount";
                                                                }
                                                            ?>
                                                              <option value="<?php echo $edit['symbol_position']; ?>"><?php echo $location2; ?></option>
                                                              <option value="">-Select below-</option>
                                                              <?php		
                                                            }
                                                            ?>
                                                              <option value="1">Before Amount</option>
                                                              <option value="2">After Amount</option>
                                                          </select>
                                                      </td>
                                                  </tr>
                                              	</table>
                                            	</td>
                                        	</tr>
                                         <tr>
                                         	<td>
                                                 <table border="0" width="50%" cellpadding="2" cellspacing="2">
                                                  <tr>
                                                      <td width="39%">
                                                      </td>
                                                      <td>
                                                          <?php
                                                          if($_GET['edit'])
                                                          {
                                                          ?>
                                                              <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                                              <input  type="submit" value="Save Changes">
                                                          <?php	
                                                          }
                                                          else
                                                          {
                                                          ?>
                                                              <input type="hidden" name="editid" id="editid" value="0">
                                                              <input  type="submit" value="Add Currency">
                                                          <?php	
                                                          }
                                                          ?>
                                                      </td>
                                                  </tr>
                                                 </table>
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
				else
				{
					$query = mysql_query("SELECT * FROM currency_setup");
					
					$number = mysql_num_rows($query);
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<b>View Currencies</b>
								</td>
                                <td height="10px" align="right">
									Found: <b><?php echo $number; ?></b>
								</td>
							</tr>
							<?php
							if($number == 0)
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<i>No currencies found!</i>
								</td>
							</tr>
							<?php
							}
							else
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdmain" width="3%">
												#
											</td>
											<td class="tdmain" width="3%">
												Edit
											</td>
											<td width="6%" class="tdmain">
												In Use
											</td>
                                             <td class="tdmain">
												Currency
											</td>
                                             <td class="tdmain">
												Currency Abbrev
											</td>
                                             <td class="tdmain">
												Currency Abbrev Position
											</td>
                                             <td class="tdmain">
												Symbol
											</td>
                                             <td class="tdmain">
												Symbol Position
											</td>
											<td class="tdmain" width="3%">
												Delete
											</td>
										</tr>
										<?php
										
										$counter = 1;
										
										while($result = mysql_fetch_array($query))
										{
										
											if(($counter%2)==0)
											{
												$row = "evenrow";
											}
											else
											{
												$row = "oddrow";
											}
										?>
										<tr class="<?php echo $row; ?>">
											<td class="tdother" valign="top">
												<b><?php echo $counter; ?>.</b>
											</td>
											<td class="tdother" valign="top">
												<a href="../panel_area/settings.php?task=currency&edit=<?php echo base64_encode($result['id']); ?>" title="Edit currency - <?php echo $result['currency']; ?>" class="links">Edit</a>
											</td>
											<td class="tdother" id="centertd" valign="top">
												<input type="radio" name="selected" id="selected" <?php if($result['inuse'] == 1) { echo "checked=\"checked\""; } ?> value="<?php echo $result['id']; ?>" onClick="return selectionCurrency('<?php echo $result['id']; ?>', '<?php echo $result['currency']; ?>');">
											</td>
                                             <td class="tdother" valign="top">
												<?php echo $result['currency']; ?>
											</td>
                                             <td class="tdother" valign="top">
												<?php echo $result['currency_abbrev']; ?>
											</td>
                                             <td class="tdother" valign="top">
												<?php
												
												if($result['currency_abbrev_position'] == 1)
												{
													echo "Before Amount"; 
												}
												else
												{
													echo "After Amount"; 
												}
												
												?>
											</td>
                                             <td class="tdother" valign="top">
												<?php echo $result['symbol']; ?>
											</td>
                                             <td class="tdother" valign="top">
												<?php 
												
												if($result['symbol_position'] == 1)
												{
												
													echo "Before Amount"; 
												}
												else
												{
													echo "After Amount"; 
												}
												
												?>
											</td>
											<td class="tdother" valign="top">
												<a href="#" onclick="return promptAction('Delete Currency - <?php echo $result['currency']; ?>', '../panel_area/settings.php?dcur=<?php echo base64_encode($result['id']); ?>');" title="Delete currency - <?php echo $result['currency']; ?>" class="links">Delete</a>
											</td>
										</tr>
										<?php	
										$counter++;
										}
										?>
									</table>
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
		</td>
	</tr>
	<?php	
	}
	elseif($_GET['task'] == "year")
	{
	?>
	<tr>
		<td align="left" style="padding-top:10px;">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">
						<b>Manage Years</b> [<a href="../panel_area/settings.php?task=year&t=add" class="links" title="Add Year">Add Year</a>] [<a href="../panel_area/settings.php?task=year&t=view" class="links" title="View Years">View Years</a>] [<a href="../panel_area/settings.php?task=year&t=months" class="links" title="View Months">View Months</a>]
					</td>
				</tr>
				<?php
				if($_GET['t'] == "add" || $_GET['edit'])
				{
					if($_GET['edit'])
					{
						$id = base64_decode($_GET['edit']);
					
						$edit = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE id = '".$id."'"));
					}
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<?php
                                    if($_GET['edit'])
									{
									?>
                                    	<b>Edit Year - </b> <?php echo $edit['names']; ?>
                                    <?php		
									}
									else
									{
									?>
                                    	<b>Add Year</b>
                                   	<?php
									}
									?>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<div id="error_msg">
									</div>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<form method="post" autocomplete = "off" action="xmlactionx--" onsubmit="return Empty('year', 'Please enter year', 'error_msg') && addoreditYear('year', 'editid', 'error_msg');">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    	<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="15%" style="text-align:right;">
                                                            Year: &nbsp;
                                                        </td>
                                                        <td>
                                                            <input type="text" name="year" id="year" size="38" value="<?php echo $edit['names']; ?>" onKeyDown="return onlyNumbers('year', 'error_msg');">
                                                        </td>
                                                    </tr>
                                               	</table>
                                           	</td>
                                       	</tr>
                                   		<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="2">
                                                    <tr>
                                                        <td width="18%">
                                                        </td>
                                                        <td align="left">
                                                            <?php
                                                            if($_GET['edit'])
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                                                <input  type="submit" value="Save Changes">
                                                            <?php	
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="0">
                                                                <input  type="submit" value="Add Year">
                                                            <?php	
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                              	</table>
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
				elseif($_GET['t'] == "months")
				{
					$query = mysql_query("SELECT * FROM months ORDER BY id ASC");
					
					$number = mysql_num_rows($query);
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<b>View Months</b>
								</td>
                                <td height="10px" align="right">
									Found: <b><?php echo $number; ?></b>
								</td>
							</tr>
							<?php
							if($number == 0)
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<i>No months found!</i>
								</td>
							</tr>
							<?php
							}
							else
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<table border="0" width="20%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdmain" width="5%">
												#
											</td>
											<td class="tdmain">
												Month
											</td>
										</tr>
										<?php
										
										$counter = 1;
										
										while($result = mysql_fetch_array($query))
										{
										
											if(($counter%2)==0)
											{
												$row = "evenrow";
											}
											else
											{
												$row = "oddrow";
											}
										?>
										<tr class="<?php echo $row; ?>">
											<td class="tdother" valign="top">
												<b><?php echo $counter; ?>.</b>
											</td>
                                            <td class="tdother" valign="top">
												<?php echo $result['names']; ?>
											</td>
										</tr>
										<?php	
										$counter++;
										}
										?>
									</table>
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
					$query = mysql_query("SELECT * FROM year ORDER BY names DESC");
					
					$number = mysql_num_rows($query);
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<b>View Years</b>
								</td>
                                <td height="10px" align="right">
									Found: <b><?php echo $number; ?></b>
								</td>
							</tr>
							<?php
							if($number == 0)
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<i>No years found!</i>
								</td>
							</tr>
							<?php
							}
							else
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<table border="0" width="40%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdmain" width="5%">
												#
											</td>
											<td class="tdmain" width="5%">
												Edit
											</td>
                                            <td class="tdmain" width="5%">
												Active
											</td>
											<td class="tdmain">
												Year
											</td>
											<td class="tdmain" width="5%">
												Delete
											</td>
										</tr>
										<?php
										
										$counter = 1;
										
										while($result = mysql_fetch_array($query))
										{
										
											if(($counter%2)==0)
											{
												$row = "evenrow";
											}
											else
											{
												$row = "oddrow";
											}
										?>
										<tr class="<?php echo $row; ?>">
											<td class="tdother" valign="top">
												<b><?php echo $counter; ?>.</b>
											</td>
											<td class="tdother" valign="top">
												<a href="../panel_area/settings.php?task=year&edit=<?php echo base64_encode($result['id']); ?>" title="Edit year - <?php echo $result['names']; ?>" class="links">Edit</a>
											</td>
											<td class="tdother" id="centertd" valign="top">
												<input type="radio" name="activeyear" id="activeyear" <?php if($result['activeyear'] == 1) { echo "checked=\"checked\""; } ?> value="<?php echo $result['id']; ?>" onClick="return selectionYear('<?php echo $result['id']; ?>', '<?php echo $result['names']; ?>');">
											</td>
                                            <td class="tdother" valign="top">
												<?php echo $result['names']; ?>
											</td>
											<td class="tdother" valign="top">
												<a href="#" onclick="return promptAction('Delete year - <?php echo $result['names']; ?>', '../panel_area/settings.php?dyear=<?php echo base64_encode($result['id']); ?>');" title="Delete year - <?php echo $result['names']; ?>" class="links">Delete</a>
											</td>
										</tr>
										<?php	
										$counter++;
										}
										?>
									</table>
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
		</td>
	</tr>
	<?php	
	}
	elseif($_GET['task'] == "durations")
	{
	?>
	<tr>
		<td align="left" style="padding-top:10px;">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">
						<b>Manage Payment Durations</b> [<a href="../panel_area/settings.php?task=durations&t=add" class="links" title="Add Payment Duration">Add Payment Duration</a>] [<a href="../panel_area/settings.php?task=durations&t=view" class="links" title="View Payment Durations">View Payment Durations</a>]
					</td>
				</tr>
				<?php
				if($_GET['t'] == "add" || $_GET['edit'])
				{
					if($_GET['edit'])
					{
						$id = base64_decode($_GET['edit']);
					
						$edit = mysql_fetch_array(mysql_query("SELECT * FROM payment_durations WHERE id = '".$id."'"));
					}
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<?php
                                    if($_GET['edit'])
									{
									?>
                                    	<b>Edit Payment Durations - </b> <?php echo $edit['names']; ?>
                                    <?php		
									}
									else
									{
									?>
                                    	<b>Add Payment Durations</b>
                                   	<?php
									}
									?>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<div id="error_msg">
									</div>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<form method="post" autocomplete = "off" action="xmlactionx--" onsubmit="return Empty('names', 'Please enter names of duration', 'error_msg') && Empty('duration', 'Please enter duration', 'error_msg') && addoreditPaymentDurations('names', 'duration', 'editid', 'error_msg');">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    	<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="17%" style="text-align:right;">
                                                            Names: &nbsp;
                                                        </td>
                                                        <td>
                                                            <input type="text" name="names" id="names" size="38" value="<?php echo $edit['names']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right;">
                                                            Duration: &nbsp;
                                                        </td>
                                                        <td>
                                                            <input type="text" name="duration" id="duration" size="38" value="<?php echo $edit['duration']; ?>" onKeyDown="return onlyNumbers('duration', 'error_msg');">
                                                        </td>
                                                    </tr>
                                               	</table>
                                           	</td>
                                       	</tr>
                                   		<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="17%">
                                                        </td>
                                                        <td align="left">
                                                            <?php
                                                            if($_GET['edit'])
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                                                <input  type="submit" value="Save Changes">
                                                            <?php	
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="0">
                                                                <input  type="submit" value="Add Payment Duration">
                                                            <?php	
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                              	</table>
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
				else
				{
					$query = mysql_query("SELECT * FROM payment_durations ORDER BY duration ASC");
					
					$number = mysql_num_rows($query);
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<b>View Payment Durations</b>
								</td>
                                <td height="10px" align="right">
									Found: <b><?php echo $number; ?></b>
								</td>
							</tr>
							<?php
							if($number == 0)
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<i>No payment durations found!</i>
								</td>
							</tr>
							<?php
							}
							else
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<table border="0" width="40%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdmain" width="4%">
												#
											</td>
											<td class="tdmain" width="4%">
												Edit
											</td>
                                            <td class="tdmain" width="40%">
												Names
											</td>
											<td class="tdmain">
												Duration
											</td>
											<td class="tdmain" width="4%">
												Delete
											</td>
										</tr>
										<?php
										
										$counter = 1;
										
										while($result = mysql_fetch_array($query))
										{
										
											if(($counter%2)==0)
											{
												$row = "evenrow";
											}
											else
											{
												$row = "oddrow";
											}
										?>
										<tr class="<?php echo $row; ?>">
											<td class="tdother" valign="top">
												<b><?php echo $counter; ?>.</b>
											</td>
											<td class="tdother" valign="top">
												<a href="../panel_area/settings.php?task=durations&edit=<?php echo base64_encode($result['id']); ?>" title="Edit payment duration - <?php echo $result['names']; ?>" class="links">Edit</a>
											</td>
											<td class="tdother" id="centertd" valign="top">
												<?php echo $result['names']; ?>
											</td>
                                            <td class="tdother" valign="top">
												<?php echo $result['duration']; ?>
											</td>
											<td class="tdother" valign="top">
												<a href="#" onclick="return promptAction('Delete payment duration - <?php echo $result['names']; ?>', '../panel_area/settings.php?ddur=<?php echo base64_encode($result['id']); ?>');" title="Delete payment duration - <?php echo $result['names']; ?>" class="links">Delete</a>
											</td>
										</tr>
										<?php	
										$counter++;
										}
										?>
									</table>
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
		</td>
	</tr>
	<?php	
	}
	elseif($_GET['task'] == "rates")
	{
	?>
	<tr>
		<td align="left" style="padding-top:10px;">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">
						<b>Manage Payment Rates</b> [<a href="../panel_area/settings.php?task=rates&t=add" class="links" title="Add Payment Rate">Add Payment Rate</a>] [<a href="../panel_area/settings.php?task=rates&t=view" class="links" title="View Payment Rates">View Payment Rates</a>]
					</td>
				</tr>
				<?php
				if($_GET['t'] == "add" || $_GET['edit'])
				{
					if($_GET['edit'])
					{
						$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
						
						$id = base64_decode($_GET['edit']);
						
						$edit = mysql_fetch_array(mysql_query("SELECT * FROM payment_rates WHERE id = '".$id."'"));
						
						if($currency['currency_abbrev_position'] == 1)
						{
							$prev = $currency['currency_abbrev'];
						}
							
						if($currency['symbol_position'] == 1)
						{
							$prev =  " ".$currency['symbol'];
						}
							
						$cost = " ".number_format($edit['paymentrate'], "0", "", ","); 
							
						if($currency['symbol_position'] == 2)
						{
							$after =  $currency['symbol'];
						}
							
						if($currency['currency_abbrev_position'] == 2)
						{
							$after =  $currency['currency_abbrev'];
						}
						
						$rates = $prev.$cost.$after;
					}
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<?php
                                    if($_GET['edit'])
									{
									?>
                                    	<b>Edit Payment Rates - </b> <?php echo $rates; ?>
                                    <?php		
									}
									else
									{
									?>
                                    	<b>Add Payment Rates</b>
                                   	<?php
									}
									?>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<div id="error_msg">
									</div>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<form method="post" autocomplete = "off" action="xmlactionx--" onsubmit="return Empty('durationid', 'Please select payment duration', 'error_msg') && Empty('paymentrate', 'Please enter payment rate', 'error_msg') && addoreditPaymentRates('durationid', 'paymentrate', 'editid', 'error_msg');">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    	<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="30%" style="text-align:right;">
                                                            Payment duration: &nbsp;
                                                        </td>
                                                        <td>
                                                           <?php 

															$qry = mysql_query("SELECT id, names FROM payment_durations ORDER BY duration ASC");
															
															$num = mysql_num_rows($qry);
															
															if($num != 0)
															{
															?>
																<select name="durationid" id="durationid">
															   <?php
                                                               if($_GET['edit'])
															   {
																   $duration = mysql_fetch_array(mysql_query("SELECT names FROM payment_durations WHERE id = '".$edit['durationid']."'"));
																?>
                                                                <option value="<?php echo $edit['durationid']; ?>"><?php echo $duration['names']; ?></option>
                                                                <?php	   
															   }
															   ?>
                                                               <option value="">Duration</option>
															   <?php
                                                               
                                                               while($result = mysql_fetch_array($qry))
                                                                {
                                                                ?>
                                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['names']; ?></option>
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
                                                        <td style="text-align:right;">
                                                            Payment rate: &nbsp;
                                                        </td>
                                                        <td>
                                                            <input type="text" name="paymentrate" id="paymentrate" size="38" value="<?php echo $edit['paymentrate']; ?>" onKeyDown="return onlyNumbers('paymentrate', 'error_msg');">
                                                        </td>
                                                    </tr>
                                               	</table>
                                           	</td>
                                       	</tr>
                                   		<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="30%">
                                                        </td>
                                                        <td align="left">
                                                            <?php
                                                            if($_GET['edit'])
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                                                <input  type="submit" value="Save Changes">
                                                            <?php	
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="0">
                                                                <input  type="submit" value="Add Payment Rate">
                                                            <?php	
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                              	</table>
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
				else
				{
					$query = mysql_query("SELECT d.names, r.* FROM payment_durations d, payment_rates r WHERE d.id = r.durationid ORDER BY d.duration ASC");
					
					$number = mysql_num_rows($query);
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<b>View Payment Rates</b>
								</td>
                                <td height="10px" align="right">
									Found: <b><?php echo $number; ?></b>
								</td>
							</tr>
							<?php
							if($number == 0)
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<i>No payment rates found!</i>
								</td>
							</tr>
							<?php
							}
							else
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<table border="0" width="60%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdmain" width="4%">
												#
											</td>
											<td class="tdmain" width="4%">
												Edit
											</td>
                                            <td class="tdmain" width="40%">
												Payment Duration
											</td>
											<td class="tdmain">
												Payment Rate
											</td>
											<td class="tdmain" width="4%">
												Delete
											</td>
										</tr>
										<?php
										
										$counter = 1;
										
										$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
										
										while($result = mysql_fetch_array($query))
										{
										
											if(($counter%2)==0)
											{
												$row = "evenrow";
											}
											else
											{
												$row = "oddrow";
											}
											
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
											
											$rates = $prev.$cost.$after;
											//$rates = $result['paymentrate'];
										?>
										<tr class="<?php echo $row; ?>">
											<td class="tdother" valign="top">
												<b><?php echo $counter; ?>.</b>
											</td>
											<td class="tdother" valign="top">
												<a href="../panel_area/settings.php?task=rates&edit=<?php echo base64_encode($result['id']); ?>" title="Edit payment rate - <?php echo $rates; ?>" class="links">Edit</a>
											</td>
											<td class="tdother" id="centertd" valign="top">
												<?php echo $result['names']; ?>
											</td>
                                            <td class="tdother" valign="top">
												<?php echo $rates; ?>
											</td>
											<td class="tdother" valign="top">
												<a href="#" onclick="return promptAction('Delete payment rate - <?php echo $rates; ?>', '../panel_area/settings.php?drat=<?php echo base64_encode($result['id']); ?>');" title="Delete payment rate - <?php echo $rates; ?>" class="links">Delete</a>
											</td>
										</tr>
										<?php	
										$counter++;
										}
										?>
									</table>
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
		</td>
	</tr>
	<?php	
	}
	elseif($_GET['task'] == "exchange")
	{
	?>
	<tr>
		<td align="left" style="padding-top:10px;">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">
						<b>Manage Exchange Rates</b> [<a href="../panel_area/settings.php?task=exchange&t=add" class="links" title="Add Exchange Rate">Add Exchange Rate</a>] [<a href="../panel_area/settings.php?task=exchange&t=view" class="links" title="View Exchange Rates">View Exchange Rates</a>]
					</td>
				</tr>
				<?php
				if($_GET['t'] == "add" || $_GET['edit'])
				{
					if($_GET['edit'])
					{
						$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
						
						$id = base64_decode($_GET['edit']);
						
						$edit = mysql_fetch_array(mysql_query("SELECT * FROM payment_rates WHERE id = '".$id."'"));
						
						if($currency['currency_abbrev_position'] == 1)
						{
							$prev = $currency['currency_abbrev'];
						}
							
						if($currency['symbol_position'] == 1)
						{
							$prev =  " ".$currency['symbol'];
						}
							
						$cost = " ".number_format($edit['paymentrate'], "0", "", ","); 
							
						if($currency['symbol_position'] == 2)
						{
							$after =  $currency['symbol'];
						}
							
						if($currency['currency_abbrev_position'] == 2)
						{
							$after =  $currency['currency_abbrev'];
						}
						
						$rates = $prev.$cost.$after;
					}
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<?php
                                    if($_GET['edit'])
									{
									?>
                                    	<b>Edit Exchange Rates - </b> <?php echo $rates; ?>
                                    <?php		
									}
									else
									{
									?>
                                    	<b>Add Exchange Rates</b>
                                   	<?php
									}
									?>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<div id="error_msg">
									</div>
								</td>
							</tr>
							<tr>
								<td align="left" style="padding-top:10px;">
									<form method="post" autocomplete = "off" action="xmlactionx--" onsubmit="return Empty('fromid', 'Please enter select FROM currency', 'error_msg') && Empty('toid', 'Please enter select TO currency', 'error_msg') && Empty('monthid', 'Please enter select month', 'error_msg') && Empty('amount', 'Please enter amount', 'error_msg') && addoreditExchangeRates('fromid', 'toid', 'monthid', 'amount', 'editid', 'error_msg');">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    	<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="30%" style="text-align:right;">
                                                            From currency: &nbsp;
                                                        </td>
                                                        <td>
                                                           <?php 

															$qry = mysql_query("SELECT id, currency FROM currency_setup ORDER BY currency ASC");
															
															$num = mysql_num_rows($qry);
															
															if($num != 0)
															{
															?>
																<select name="fromid" id="fromid">
															   <?php
                                                               if($_GET['edit'])
															   {
																   $duration = mysql_fetch_array(mysql_query("SELECT names FROM currency_setup WHERE id = '".$edit['durationid']."'"));
																?>
                                                                <option value="<?php echo $edit['durationid']; ?>"><?php echo $duration['names']; ?></option>
                                                                <?php	   
															   }
															   ?>
                                                               <option value="">- From This Currency -</option>
															   <?php
                                                               
                                                               while($result = mysql_fetch_array($qry))
                                                                {
                                                                ?>
                                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['currency']; ?></option>
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
                                                            <input type="hidden" name="fromid" id="fromid" value="">
                                                            <?php		
															}
															?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right;">
                                                            To currency: &nbsp;
                                                        </td>
                                                        <td>
                                                           <?php 

															$qry = mysql_query("SELECT id, currency FROM currency_setup ORDER BY currency ASC");
															
															$num = mysql_num_rows($qry);
															
															if($num != 0)
															{
															?>
																<select name="toid" id="toid">
															   <?php
                                                               if($_GET['edit'])
															   {
																   $duration = mysql_fetch_array(mysql_query("SELECT names FROM payment_durations WHERE id = '".$edit['durationid']."'"));
																?>
                                                                <option value="<?php echo $edit['durationid']; ?>"><?php echo $duration['names']; ?></option>
                                                                <?php	   
															   }
															   ?>
                                                               <option value="">- To This Currency -</option>
															   <?php
                                                               
                                                               while($result = mysql_fetch_array($qry))
                                                                {
                                                                ?>
                                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['currency']; ?></option>
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
                                                            <input type="hidden" name="toid" id="toid" value="">
                                                            <?php		
															}
															?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right;">
                                                            Month: &nbsp;
                                                        </td>
                                                        <td>
                                                            <?php 

															$qry = mysql_query("SELECT * FROM months ORDER BY id ASC");
															
															$num = mysql_num_rows($qry);
															
															if($num != 0)
															{
															?>
																<select name="monthid" id="monthid">
															   	<?php
                                                               if($_GET['edit'])
															   {
																   $month = mysql_fetch_array(mysql_query("SELECT names FROM months WHERE id = '".$edit['monthid']."'"));
																?>
                                                                <option value="<?php echo $edit['monthid']; ?>"><?php echo $month['names']; ?></option>
                                                                <?php	   
															   }
                                                               
                                                               while($result = mysql_fetch_array($qry))
                                                                {
                                                                ?>
                                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['names']; ?></option>
                                                                <?php	
                                                                }
                                                                ?>
                                                                </select>
                                                                <?php
																}
																
															?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right;">
                                                            Amount: &nbsp;
                                                        </td>
                                                        <td>
                                                            <input type="text" name="amount" id="amount" size="38" value="<?php echo $edit['amount']; ?>" onKeyDown="return onlyNumbers('amount', 'error_msg');">
                                                        </td>
                                                    </tr>
                                               	</table>
                                           	</td>
                                       	</tr>
                                   		<tr>
                                    		<td>
                                        		<table border="0" width="40%" cellpadding="2" cellspacing="8">
                                                    <tr>
                                                        <td width="30%">
                                                        </td>
                                                        <td align="left">
                                                            <?php
                                                            if($_GET['edit'])
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                                                <input  type="submit" value="Save Changes">
                                                            <?php	
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <input type="hidden" name="editid" id="editid" value="0">
                                                                <input  type="submit" value="Add Exchange Rate">
                                                            <?php	
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                              	</table>
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
				else
				{
					$query = mysql_query("SELECT * FROM exchange_rates ORDER BY date_posted DESC");
					
					$number = mysql_num_rows($query);
				?>
				<tr>
					<td align="left" style="padding-top:10px;">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="left">
									<b>View Exchange Rates</b>
								</td>
                                <td height="10px" align="right">
									Found: <b><?php echo $number; ?></b>
								</td>
							</tr>
							<?php
							if($number == 0)
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<i>No exchange rates found!</i>
								</td>
							</tr>
							<?php
							}
							else
							{
							?>
							<tr>
								<td colspan="2" align="left" style="padding-top:10px;">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdmain" width="3%">
												#
											</td>
											<td class="tdmain" width="3%">
												Edit
											</td>
                                            <td class="tdmain" width="10%">
												Year
											</td>
                                            <td class="tdmain" width="15%">
												Month
											</td>
											<td class="tdmain">
												Exchange Rate
											</td>
											<td class="tdmain" width="3%">
												Delete
											</td>
										</tr>
										<?php
										
										$counter = 1;
										
										while($result = mysql_fetch_array($query))
										{
										
											if(($counter%2)==0)
											{
												$row = "evenrow";
											}
											else
											{
												$row = "oddrow";
											}
											
											$currency1 = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE id = '".$result['fromid']."'"));
											
											$currency2 = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE id = '".$result['toid']."'"));
											
											$thiscost = "";
											
											if($currency1['currency_abbrev_position'] == 1)
											{
												$prev1 = $currency1['currency_abbrev'];
											}
												
											if($currency1['symbol_position'] == 1)
											{
												$prev1 =  " ".$currency1['symbol'];
											}
												
											$rate1 = " ".number_format(1, "0", "", ","); 
												
											if($currency1['symbol_position'] == 2)
											{
												$after1 =  $currency1['symbol'];
											}
												
											if($currency1['currency_abbrev_position'] == 2)
											{
												$after1 =  $currency1['currency_abbrev'];
											}
											
											if($currency2['currency_abbrev_position'] == 1)
											{
												$prev2 = $currency2['currency_abbrev'];
											}
												
											if($currency2['symbol_position'] == 1)
											{
												$prev2 =  " ".$currency2['symbol'];
											}
												
											$rate2 = " ".number_format($result['amount'], "0", "", ","); 
												
											if($currency2['symbol_position'] == 2)
											{
												$after2 =  $currency2['symbol'];
											}
												
											if($currency2['currency_abbrev_position'] == 2)
											{
												$after2 =  $currency2['currency_abbrev'];
											}
											
											$exchange1 = $prev1.$rate1.$after1." ".$currency1['currency'];
											
											$exchange2 = $prev2.$rate2.$after2." ".$currency2['currency'];
											
											$exchange = $exchange1." Equals To ".$exchange2;
											
											$thisexchange = $exchange1." <b>Equals To</b> ".$exchange2;
										?>
										<tr class="<?php echo $row; ?>">
											<td class="tdother" valign="top">
												<b><?php echo $counter; ?>.</b>
											</td>
											<td class="tdother" valign="top">
												<a href="../panel_area/settings.php?task=exchange&edit=<?php echo base64_encode($result['id']); ?>" title="Edit exchange rate - <?php echo $exchange; ?>" class="links">Edit</a>
											</td>
											<td class="tdother" id="centertd" valign="top">
												<?php 
												
												$year = mysql_fetch_array(mysql_query("SELECT names FROM year WHERE id = '".$result['yearid']."'"));
												
												echo $year[0]; 
												
												?>
											</td>
                                            <td class="tdother" valign="top">
												<?php 
												
												$month = mysql_fetch_array(mysql_query("SELECT names FROM months WHERE id = '".$result['monthid']."'"));
												
												echo $month[0]; 
												
												?>
											</td>
                                            <td class="tdother" valign="top">
												<?php echo $thisexchange; ?>
											</td>
											<td class="tdother" valign="top">
												<a href="#" onclick="return promptAction('Delete exchange rate - <?php echo $exchange; ?>', '../panel_area/settings.php?dex=<?php echo base64_encode($result['id']); ?>');" title="Delete exchange rate - <?php echo $exchange; ?>" class="links">Delete</a>
											</td>
										</tr>
										<?php	
										$counter++;
										}
										?>
									</table>
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
		</td>
	</tr>
	<?php	
	}
	?>
    <tr>
        <td style="padding-top:50px;">
        </td>
     </tr>
</table>